const $ = document.querySelector.bind(document)

$('#submit').addEventListener('click',e => { 
    e.preventDefault()
    if ($('#email').value == '') {
        $('#email').parentNode.className += ' invalid'
    }else if ($('#nickname').value === '') {
        $('#nickname').parentNode.className += ' invalid'
    }else if (!$('#radio1').checked && !$('#radio2').checked) {
        $('#radio1').parentNode.className += ' invalid'
    }else if ($('#job').value === '') {
        $('#job').parentNode.className += ' invalid'
    }else if ($('#learned').value === '') {
        $('#learned').parentNode.className += ' invalid'
    }else {
        console.log($('#email').value)
        console.log($('#nickname').value)
        console.log('type1' + $('#radio1').check)
        console.log('type2' + $('#radio2').check)
        console.log($('#job').value)
        console.log($('#learned').value)
        console.log(other.value)
        alert('已送出表單!')
    }
})

