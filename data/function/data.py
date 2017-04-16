#!/usr/bin/python
# -*- coding: utf-8 -*-

#!/usr/bin/python
# -*- coding: utf-8 -*-



import MySQLdb as mdb

con = mdb.connect('localhost', 'root', 'erevos13', 'watt');

with con: 
	
    cur = con.cursor()
    cur.execute("SELECT * FROM consumption  WHERE date_time BETWEEN (NOW() - INTERVAL 1 MINUTE) AND	NOW()")

    rows = cur.fetchone()
    watt =[]
    date =[]
    while rows is not None:
    	
    	watt.append(rows[0])
    	date.append(rows[1])    	
    	rows = cur.fetchone()
    




cur.close()
con.close()