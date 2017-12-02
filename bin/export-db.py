# Run me from root directory, e.g. `python bin/export-db.py`

import json
import requests
import shutil
from getpass import getpass
from contextlib import closing


print "Hello, you are about to download a backup of the wordpress website database, for the purposes of archiving or updating the development version of the website. Cool? Let's proceed."


def get_connection_info():
    default_file = '.secret/live/export-db.json'
    info_file = raw_input("Enter path to JSON file containing secret connection info data (hit Enter to accept default of '%s'): " % default_file)
    if not info_file:
        info_file = default_file
    print "you entered", info_file

    with open(info_file) as in_f:
        info = json.load(in_f)
        print "you loaded connection info '%s'" % info
        
    return info


def out_rsp(session, response):
    print "\t>>>>>got status code", response.status_code
    #print "got cookies", response.cookies
    #print "response content", response.text
    print "\t>>>>>response url", response.url
    #print "session cookies", session.cookies

    
def slurpbackup(username, password, dbname, auth_url, phpmyadmin_url, export_url):

    with requests.session() as s:

        auth_data = {
            'credential_0': username,
            'credential_1': password
        }
        authd = s.post(auth_url, data=auth_data, allow_redirects = False)
        out_rsp(s, authd)

        if authd.status_code == 200:

            phpmyadmin_url = phpmyadmin_url + '?loginname=%s;dbname=%s'
            phpmyadmin_url = phpmyadmin_url % (dbname,dbname)
            phpmyadmin_response = s.get(phpmyadmin_url)
            out_rsp(s, phpmyadmin_response)
            if phpmyadmin_response.status_code == 200:
                export_data = {
                    'export_type':'server',
                    'what':'sql',
                    'sql_compat':'NONE',
                    'sql_structure':'structure',
                    'drop':1,
                    'sql_auto_increment':1,
                    'use_backquotes':1,
                    'sql_data':'data',
                    'max_query_size':'50000',
                    'hexforbinary':'yes',
                    'sql_type':'insert',
                    'asfile':'sendit',
                    'filename_template':'__DB__-%F',
                    'compression':'gzip'
                }

                with closing(s.post(export_url, data=export_data, stream=True)) as r:
                    out_rsp(s, r)
                    # print 'all headers', r.headers
                    fname = r.headers['filename'] if 'filename' in r.headers else 'exported.sql.gz'
                    if r.status_code == 200:
                        print "writing to file %s..." % fname
                        with open(fname, 'wb') as f:
                            shutil.copyfileobj(r.raw, f)
                    else:
                        print "phpmyadmin failed to export :("
            else:
                print "phpmyadmin failed to load :("
        else:
            print "authentication failed :("

            
c = get_connection_info()
password = getpass("Password for hosting provider account:")
slurpbackup(c['username'],
            password,
            c['dbname'],
            c['auth_url'],
            c['phpmyadmin_url'],
            c['export_url'])

