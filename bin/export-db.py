import requests
import shutil
from getpass import getpass
from contextlib import closing

print "Hello, you are about to download a backup of the wordpress website database, for the purposes of archiving or updating the development version of the website. Cool? Let's proceed."

#username = raw_input("Username for hosting provider account: ")
#print "you entered", username

#password = getpass("Password for hosting provider account:")
#print "Aha! So your password is '%s', is it?!" % password

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
                    #'filename_template':'__SERVER__',
                    'filename_template':'__DB__-%F',
                    'compression':'gzip'
                }

                with closing(s.post(export_url, data=export_data, stream=True)) as r:
                    out_rsp(s, r)
                    # print 'all headers', r.headers
                    # fname = 'bar.sql.gz'
                    fname = r.headers['filename'] if 'filename' in r.headers else 'exported.sql.gz'
                    if r.status_code == 200:
                        print "writing to file %s..." % fname
                        with open(fname, 'wb') as f:
                            shutil.copyfileobj(r.raw, f)
                            # for chunk in r.iter_content(chunk_size=1024):
                            #     if chunk: # filter out keep-alive new chunks
                            #         f.write(chunk)
                
            else:
                print "phpmyadmin failed to load :("
        else:
            print "authentication failed :("

slurpbackup('TODO', 'TODO', 'TODO'...)
