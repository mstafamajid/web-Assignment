const h4 = document.querySelectorAll('.info-about-eachbook h4');
for (let index = 0; index < h4.length; index++) {
    const text = h4[index].textContent;
    if (text.length > 15) {
      h4[index].textContent = text.slice(0, 12) + '...';
    }
   
    
}