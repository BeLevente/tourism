//loading the database

window.addEventListener("load",function(){
  
    getDatabase(name,type);
    
})

//function to get a request from the server
function getDatabase(name,type)
{
    const a=new XMLHttpRequest();
    a.onload=function(){
        if(this.readyState==4 && this.status==200)
        document.getElementById("content").innerHTML=this.responseText;
    }
    a.open("POST","getdatabase.php?user-name="+name+"&user-type="+type,true);
    a.send();

}

