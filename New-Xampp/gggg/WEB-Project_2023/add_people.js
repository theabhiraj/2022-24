window.addEventListener('DOMContentLoaded', () => {
    let Header_2 = [...document.getElementsByTagName("h2")]
    for(let i = 0; i < Header_2.length; i++)
    {
        Header_2[i].style.fontSize = "40px"
    }
    /// 
    function checkID(id) {
        const regex = /^[1-8]\d{12}$/
        return regex.test(id) // Returns "true" if it finds a match, otherwise "false".
    }
    function checkBirthDate(date) {
        const regex = /^(0[1-9]|[12][0-9]|3[01])\.(0[1-9]|1[012])\.(19\d\d|20\d\d)$/
        return regex.test(date) // Returns "true" if it finds a match, otherwise "false".
    }
    let peopleList = []
    ///
    document.querySelector(".adding").addEventListener('click', () => {
        const Name = prompt("Full Name:")
        const id = prompt("ID:")
        if (!checkID(id)) {
            alert("The ID is not valid!")
            return
        }
        const birthDate = prompt("Birth Date [format accepted: dd.mm.yyyy]:")
        if (!checkBirthDate(birthDate)) {
            alert("The Birth Date is not valid!")
            return
        }
        const person = { // Creating an object with attributes: (Name, id, birthDate) with values from the PROMPT.
            Name,
            id,
            birthDate
        }
        peopleList.push(person)
        localStorage.setItem(`Person: ${peopleList.length}`, person.id)
        seePeople()
    })
    ///
    document.querySelector(".removing").addEventListener('click', () => {
        if(peopleList.length > 0)
        {
            console.log(localStorage.getItem(`Person: ${peopleList.length}`)) // To print to the console the last child of the people-list
            localStorage.removeItem(`Person: ${peopleList.length}`)
            peopleList.pop()
            const lista = document.getElementById("people-list")
            lista.lastChild.remove() // removes the last child of my people-list
            seePeople()
        }
        else
        {
            alert("People list is empty!")
        }
    })
    ///
    function seePeople() {
        const lista = document.getElementById("people-list")
        lista.innerHTML = ""
        peopleList.forEach(pers => {
            const li = document.createElement("li") // cream un element.
            li.innerText = `Name: ${pers.Name}, ID: ${pers.id}, Birth Date: ${pers.birthDate}`
            li.style.fontSize = "30px"
            lista.append(li) // noul element creat va deveni copil al elementului "lista".
        })
    }
    
})
