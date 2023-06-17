window.addEventListener("load", () => {
    let img = document.getElementById('profileimg');
    let img1 = document.getElementById('profileimg1');
    img.addEventListener('change', (event) => {
      // Get the selected file
      var file = event.target.files[0];
      var imgSize = file['size']/1024;
      
      if(imgSize>300)
      {
        file = "";
        alert("Unable to Upload image. Profile Photo Max Size Exceeded !");
      }else{
         // Create a URL for the selected file
      var imageURL = URL.createObjectURL(file);
      
      // Display the image in HTML
      var previewImage = document.getElementById('image-show');
        previewImage.src = imageURL;
      }
      
     
      
    });
    img1.addEventListener('change', (event) => {
      // Get the selected file
      var file = event.target.files[0];
      var imgSize = file['size']/1024;
      
      if(imgSize>300)
      {
        file = "";
        alert("Unable to Upload image. Profile Photo Max Size Exceeded !");
      }else{
         // Create a URL for the selected file
      var imageURL = URL.createObjectURL(file);
      
      // Display the image in HTML
      var previewImage = document.getElementById('image-show1');
        previewImage.src = imageURL;
      }
      
     
      
    });
  });
  