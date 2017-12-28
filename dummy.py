#This python interface is a socket programmed interface to connect rfid tag reader with the local server via tcp connection and send the live reading to database
#This interface is make for tracking row boats in the coastal regions of india to track their behaviour and prevent unauthorized intrusion

import socket
import time
import MySQLdb
from array import *
from Tkinter import *
import tkMessageBox
import threading
root= Tk()
root.title("RTLS")
root.geometry('280x550+200+200')

def donothing():
   filewin = Toplevel(root)
   button = Button(filewin, text="Do nothing button")
   button.pack()

def aboutus():
    tkMessageBox.showinfo("About Us", "Software by:Jisu Production")

def exit_command():
        root.destroy()
              
def checkvalidation():
    hostname=datareturn(str(entry_1.get()))
    username=datareturn(str(entry_2.get()))
    password=datareturn(str(entry_3.get()))
    dbnmname=datareturn(str(entry_4.get()))
    conn = MySQLdb.connect(host= hostname,user=username,passwd=password,db=dbnmname)
    x = conn.cursor()
    return True

   
def InsertIntoDb(rfid_no,localtime,count, duration):
    hostname=datareturn(str(entry_1.get()))
    username=datareturn(str(entry_2.get()))
    password=datareturn(str(entry_3.get()))
    dbnmname=datareturn(str(entry_4.get()))
    conn = MySQLdb.connect(host= hostname,user=username,passwd=password,db=dbnmname)
    x = conn.cursor()
    try:
        x.execute("""REPLACE INTO datas VALUES (%s,%s,%s)""",(rfid_no,localtime,count))
        x.execute("""INSERT INTO rtls VALUES (%s, %s, %s, %s) """,(rfid_no, localtime, count, duration))
        conn.commit()
        return 
    except:
        conn.rollback()
        
    conn.close()    

def donothing():
    filewin = Toplevel(root)
    button = Button(filewin, text="Do nothing button")
    button.pack()
        
main= Label(root,text="CONTROL PANEL")
hostname=Label(root,text="HOSTNAME :")
username=Label(root,text="USERNAME :")
password=Label(root,text="PASSWORD :")
databasename=Label(root,text="DATABASE NAME :")
ip_address=Label(root,text="IP ADDRESS :")

entry_1= Entry(root)
entry_2= Entry(root)
entry_3= Entry(root)
entry_4= Entry(root)
entry_5= Entry(root)

main.grid(columnspan=5)
hostname.grid(row=2,sticky=E,padx=10,pady=5)
username.grid(row=4,sticky=E,padx=10,pady=5)
password.grid(row=6,sticky=E,padx=10,pady=5)
databasename.grid(row=8,sticky=E,padx=10,pady=5)
ip_address.grid(row=10,sticky=E,padx=10,pady=5)


entry_1.grid(row=2,column=2,padx=10)
entry_2.grid(row=4,column=2,padx=10)
entry_3.grid(row=6,column=2,padx=10)
entry_4.grid(row=8,column=2,padx=10)
entry_5.grid(row=10,column=2,padx=10)


def edit():
    hostname=str(entry_1.get())
    username=str(entry_2.get())
    passwd=str(entry_3.get())
    dbname=str(entry_4.get())
    ip_add=str(entry_5.get())
    if hostname and username and dbname and ip_add or passwd:
       edit.config(state='disabled')
       rl1.config(text="HOSTNAME: "+str(hostname))
       rl2.config(text="USERNAME: "+str(username))
       rl3.config(text="PASSWORD:"+str(passwd))
       rl4.config(text="DB  NAME:"+str(dbname))
       rl5.config(text="IP Address:"+str(ip_add))
    else:
       edit.config(state='normal')


def datareturn(x):
    return x

def datafetch():
    
    try:
        s=socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    except socket.error, msg:
        print 'Failed to create socket. error code:'+str(msg[0])+', Error message:'+msg[1]
        sys.exit();
    print 'Socket Created'
    host ='home';
    port=7086;
    try:

        remote_ip=datareturn(str(entry_5.get()))
    except socket.gaierror:
        print 'Hostname could not be resolved. Exiting'
        sys.exit()
    s.connect((remote_ip , port))
    print 'Socket Connected to ' + host + ' on ip ' + remote_ip
    message="U\x03\x00\x03b\x01\x015\xad"
    rfid_no=[]
    count=[]
    localtime_prev=[]
    try:
        sent=s.send(message)
        print sent
        strtdf.config(text="Data fetching started successfully")

    except socket.error:
        print 'Send failed'
        sys.exit()


    def fetch():
                threading.Timer(1.0,fetch).start()
                reply = s.recv(16384)
                def conversion(st1,st2):
                   s1=int(localtime[st1])
                   s2topart=int(localtime[st2])
                   sftopart=s1*10+s2topart
                   return sftopart
                def conversion_prev(index,st1,st2):
                    var=localtime_prev[index]
                    s1=int(var[st1])
                    s2topart=int(var[st2])
                    sftopart=s1*10+s2topart
                    return sftopart

                result=reply.encode("hex")
                L=list(result)

                len_arr=len(L)
          
                if len_arr <= 16:
                   garbagevalue=0
                else:
                  ans=L[20]+L[21]+L[22]+L[23]+L[24]+L[25]+L[26]+L[27]
                  i=int(ans,16)
                  
                  localtime = time.asctime( time.localtime(time.time()) )
              
                  if i in rfid_no:
                     b=rfid_no.index(i)
                     
                     stopart=conversion(17,18)
                     mtopart=conversion(14,15)
                     htopart=conversion(11,12)
                     sfrompart=conversion_prev(b,17,18)
                     mfrompart=conversion_prev(b,14,15)
                     hfrompart=conversion_prev(b,11,12)
                     localtime_prev[b]=localtime
                     duration=(stopart+mtopart*60+htopart*3600)-(sfrompart+mfrompart*60+hfrompart*3600)
                     
                     if duration>600:
                     	count[b]=count[b]+1                               
                  else:
                      rfid_no.append(i)
                      b=rfid_no.index(i)
                      count.append(0)
                      localtime_prev.append(localtime)
                      duration=0

              InsertIntoDb(i,localtime,count[b], duration)          
    
    return fetch()
    
def stopdatafetch():
    try:
        s=socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    except socket.error, msg:
        print 'Failed to create socket. error code:'+str(msg[0])+', Error message:'+msg[1]
        sys.exit();
    host ='home';
    port=7086;
    try:

        remote_ip=datareturn(str(entry_5.get()))#'192.168.0.238'
    except socket.gaierror:
        print 'Hostname could not be resolved. Exiting'
        sys.exit()
    s.connect((remote_ip , port))
    message="U\x04\x00\x01oWb"
    try:
        sent=s.send(message)
        print "-------------------------------------------------------------------"
        print "Reading stopped"
        print "-------------------------------------------------------------------"
    except socket.error:
        print 'Send failed'
        sys.exit()

    s.recv(16384)
    stopdf.config(text="Data fetching stopped successfully")


edit = Button(root,text="Edit Configuration",fg="black",command=edit)
edit.grid(columnspan=5,padx=5,pady=5)
lf = LabelFrame(root, text="Present Connection Details")
lf.grid(columnspan=5)
rl1=Label(lf)
rl1.grid(columnspan=5)
rl2=Label(lf)
rl2.grid(columnspan=5)
rl3=Label(lf)
rl3.grid(columnspan=5)
rl4=Label(lf)
rl4.grid(columnspan=5)
rl5=Label(lf)
rl5.grid(columnspan=5)
strtdgen = Button(root,text="Start Fetching Datas",command=datafetch)
strtdgen.grid(columnspan=5,padx=5,pady=5)
strtdf=Label(root)
strtdf.grid(columnspan=5)
stopdgen = Button(root,text="Stop Fetching Datas",command=stopdatafetch)
stopdgen.grid(columnspan=5,padx=5,pady=5)
stopdf=Label(root)
stopdf.grid(columnspan=5)
exit = Button(root,text="--EXIT--",command=exit_command)
exit.grid(columnspan=5,padx=5,pady=5)

root.mainloop()
