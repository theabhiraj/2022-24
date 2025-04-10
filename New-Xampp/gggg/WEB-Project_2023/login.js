function checkUsername(pw)
{
    const regex = /^[a-zA-Z]+$/
    return regex.test(pw)
}
const msgLog = "Username added successfully!"
window.addEventListener('DOMContentLoaded', () => {
    const currentDate = new Date()
    const divDay = document.createElement("span")
    const divMonth = document.createElement("span")
    const divYear = document.createElement("span")
    const message_1 = document.createElement("span")
    const message_2 = document.createElement("span")
    const message_3 = document.createElement("span") 
    divMonth.innerText = `-${1 + currentDate.getMonth()}`
    divYear.innerText = `-${currentDate.getFullYear()}`
    divDay.innerText = `${currentDate.getDate()}`
    message_1.innerText = "Enjoy"
    message_2.innerText = " Our"
    message_3.innerText = " Products!"
    const section = document.getElementById("date")
    const sect = document.getElementById("msg")
    section.append(divDay) // legam div-ul nou creat cu valoarea datei curente de primul section din HTML, pentru a putea fi creat acest element in pagina
    section.append(divMonth)
    section.append(divYear)
    sect.append(message_1)
    sect.append(message_2)
    sect.append(message_3)
    section.style.fontSize = "30px"
    section.style.fontWeight = "900"
    section.style.margin = "20px"
    section.style.color = "orange"
    sect.style.fontSize = "40px"
    sect.style.fontWeight = "900"
    sect.style.margin = "20px"
    sect.style.color = "green"
    
    ///
    let labels = [...document.getElementsByTagName("label")]
    labels.forEach(el => {
        el.style.fontSize = "20px"
        el.style.marginRight = "20px"
    })
    ///
    window.addEventListener('submit', () => {
        const passw = document.querySelector("#user")
        if(!checkUsername(passw.value))
        {
            alert("Invalid Username!")
            return
        }
        else
        {
            alert(msgLog.toUpperCase())
        }
    })
    ///
    const resDate = [divDay, divMonth, divYear]
    const msgs = [message_1, message_2, message_3]
    for(let i = 0; i < 3; i++)
    {
        resDate[i].style.visibility = "hidden"
        msgs[i].style.visibility = "hidden"
    }
    let count = 0
    const intervalDate = setInterval(() => {
        if(count > 2)
        {
            clearInterval(intervalDate)
        }
        else
        {
            resDate[count++].style.visibility = "visible"
        }
    }, 1500)

    for(let i = 0; i < 3; i++)
    {
        const timeOutMsg = setTimeout(() => {
            msgs[i].style.visibility = "visible"
        }, 1500 * (i + 4))
    }
    ///
    /////
    let c = 1
    let last = null
    function randomColor()
    {
        return '#' + Math.floor(Math.random()*(256**3)).toString(16) // "num.toString(base)" -- convert a number to a string, using a specified base (2, 10, 16, etc.). The "toString()" returns a number as a STRING.
    }
    window.addEventListener('contextmenu', (ev) => {
        ev.preventDefault() // Anulează evenimentul. Acțiunile ce s-ar fi întâmplat în mod implicit nu se vor mai efectua. (In acest caz, anulam comanda implicita pt. click-dreapta la mouse).
        const div = document.createElement("div")
        div.className = "rand"
        div.innerText = c++
        div.style.top = ev.clientY + 'px' // Coordonata "Y" a cursorului relativă la viewport.
        div.style.left = ev.clientX + 'px' // Coordonata "X" a cursorului relativă la viewport.
        div.style.color = randomColor()
        if(last)
        {
            last.remove() // "element.remove()" method removes an element(or node) from the document.
        }
        last = div
        document.body.append(div)
    })
})