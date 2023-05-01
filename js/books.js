const h2 = document.querySelectorAll('.eachbook .title h2');
for (let index = 0; index < h2.length; index++) {
    const text = h2[index].textContent;
    if (text.length > 16) {
      h2[index].textContent = text.slice(0, 13) + '...';
    }
   
    
}

