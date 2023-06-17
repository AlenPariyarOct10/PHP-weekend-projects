document.addEventListener('DOMContentLoaded', () => {
    let sideBarToggleBtn = document.getElementById('toggle-sidebar');
    let sideBar = document.getElementById('sidebar');
    let myProfileBtn = document.getElementById('toggle-sub-class');
    let submenu = document.getElementById('sub-menu');
    
    
  
    sideBarToggleBtn.addEventListener('click', () => {
      

      if(sideBar.style.display=='')
      {
        sideBar.style.display = "none";
      }else{
        sideBar.style.display = "";

      }
    });


   

    myProfileBtn.addEventListener('click',()=>{

        if(submenu.style.display=='')
        {
          submenu.style.display = "none";
        }else{
          submenu.style.display = "";
  
        }

    })
  });
  

