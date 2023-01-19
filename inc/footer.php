<!--footer-->
<footer>
    <p>Copyright &copy 2022-2024</p>
    <p><i class="fa fa-scale-balanced"></i> </p>
    <p>Judicial Service of Kenya</p>
</footer>

<script>
//underlining the active button
let nav=document.getElementById('navItems')
let nav2=document.getElementById('navbarholder')
let items=nav.getElementsByClassName('listItem')
let navitems=nav2.getElementsByClassName('navitem')

for(let i=0;i<items.length;i++){
    items[i].addEventListener('click', function(){
        let activeItem=document.getElementsByClassName('active')
        activeItem[0].className=activeItem[0].className.replace('active','')
        this.className +=' active'//make sure to have space
    })
}

for(let j=0;j<navitems.length;j++){
    navitems[j].addEventListener('click', function(){
        let activenavItem=document.getElementsByClassName('active2')
        activenavItem[0].className=activenavItem[0].className.replace('active2','')
        this.className +=' active2'//make sure to have space
    })
}

</script>
</body>
</html>