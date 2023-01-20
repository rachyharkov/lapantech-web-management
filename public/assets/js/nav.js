const NavCheck = document.querySelector("#checkbtn");
const NavInput = document.querySelector(".nav-toggle input");
const Target = document.querySelector(".nav-link ul")
const navlink = document.querySelectorAll(".nav-link ul li")

NavInput.addEventListener("change", function(event) {
  if(this.checked){
    NavCheck.classList.remove('fas',"fa-bars")
    NavCheck.classList.add('fas','fa-times')
    Target.classList.add("aktif")
    document.body.style.overflowY = "hidden"
  }else{
    NavCheck.classList.remove('fas','fa-times')
    NavCheck.classList.add('fas',"fa-bars")
    Target.classList.remove("aktif")
    document.body.style.overflowY = "auto"
  }
})

// ketika menu nav di mobile di klik
if(document.documentElement.clientWidth < 660 ){
    navlink.forEach((NavItem) => {
      NavItem.addEventListener('click', function(){
        document.body.style.overflowY = "auto"
        NavCheck.classList.remove('fas','fa-times')
        NavCheck.classList.add('fas',"fa-bars")
        Target.classList.remove("aktif")
      })
    })
  }

  window.addEventListener('scroll',function(){
      let navbar = document.querySelector("nav")
      navbar.classList.toggle("sticky", window.scrollY > 300)
  })


