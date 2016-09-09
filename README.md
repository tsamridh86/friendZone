# friendZone
db name : friendZone
people ( id primary key auto increment, name(first&last) , photo default default.jpg , userName, password )
follows ( people(id), people(id) )
post(postid primary key , people(id), description, img(optional) default NULL , creationDate timestamp)
comment(post(postid), people(id), descritption , creationDate timestamp)
likes(post(postid) , people(id))


all css in : css
js : 		js
profile : pics
images : images


 use camelCase notation 
bootStrap
index.php -> login / signup (quora design)
