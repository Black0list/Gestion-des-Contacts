const searchBar = document.getElementById("inputSearch");

searchBar.addEventListener("keyup",(e)=>{
    const searchedLetters = e.target.value.toLowerCase();
    const contacts = document.querySelectorAll(".table tbody tr");
    filterElements(searchedLetters,contacts);
    console.log("google")
});

function filterElements(searchedLetters, contacts) {
    contacts.forEach((contact) => {
      const contactInfo = contact.textContent.toLowerCase(); 
      if (contactInfo.includes(searchedLetters)) {
        contact.style.display = "";
      } else {
        contact.style.display = "none"; 
      }
    });
  }