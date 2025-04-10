window.addEventListener('load', () => { // Se declanșează la momentul în care pagina s-a terminat de încărcat. Poate fi atașat și pe elemente precum imagini, script-uri, etc..
    let items = [...document.getElementsByClassName("item")]
    //console.log(items)

    // "event.key" returneaza valoarea tastei apasate.
    window.addEventListener("keydown", (e) => { 
        e.stopPropagation()
        const vl = e.key
        console.log(`Target: ${e.target.tagName}`) // See on the console the tagName of this event listener 
        if(vl < 1 || vl > 6)
            return
        items[(vl - 1) % items.length].style.backgroundColor = "greenyellow"
        items[(vl - 1) % items.length].style.fontSize = "35px"
        items[(vl - 1) % items.length].style.color = "darkred"
    })

    window.addEventListener("keyup", (e) => {
        const vl = e.key
        console.log(`Current Target: ${e.currentTarget.tagName}`) // See on the console the tagName of the bubbled event listener (it is undefined)
        if(vl < 1 || vl > 6)
            return
        items[(vl - 1) % items.length].style.backgroundColor = null // starea implicita (div-uri necolorate).
        items[(vl - 1) % items.length].style.fontSize = null // starea implicita (font-size-ul setat in fisierul CSS).
        items[(vl - 1) % items.length].style.color = null // culoarea fontului de text revine la normal.
    })
    ///
    const header = document.getElementById("hdr")
    const headerComputedStyle = window.getComputedStyle(header)
    console.log(headerComputedStyle.fontFamily) // 'serif' font
    const gbcr = header.getBoundingClientRect()
    console.log(gbcr.top, gbcr.bottom)
    console.log(gbcr.left, gbcr.right)
})