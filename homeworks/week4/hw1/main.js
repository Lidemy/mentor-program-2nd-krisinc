let operator = ''
let firstNumber = 0
const $ = document.querySelector.bind(document)

function appendNum(str) {
    $('.result').innerText += str
}
function setResult(str) {
    $('.result').innerText = str
}
function getResult() {
    return $('.result').innerText
}

$('.clear').addEventListener('click', function() {
    setResult(0)
    operator = ''
    firstNumber = 0
})
$('.operator.plus').addEventListener('click', function() {
    handerOperator('+')
})
$('.operator.minus').addEventListener('click', function() {
    handerOperator('-')
})
$('.operator.multiply').addEventListener('click', function() {
    handerOperator('*')
})
$('.operator.divided').addEventListener('click', function() {
    handerOperator('/')
})
$('.equal').addEventListener('click', function() {
    handerOperator('=')
})

for(let i=0; i<=9; i++) {
    $('.number' + i).addEventListener('click', function() {
        clickNum(i)
    })
}
function clickNum(num) {
    if($('.result').innerText == 0) {
        $('.result').innerText = ''
        appendNum(num)
    }else {
        appendNum(num)
    }
}
function handerOperator(op) {
    if( op === '=') {
        secondNumber = Number(getResult())
        if(operator === '+') {
            setResult(firstNumber + secondNumber)
        }else if(operator === '-') {
            setResult(firstNumber - secondNumber)
        }else if(operator === '*') {
            setResult(firstNumber * secondNumber)
        }else {
            setResult(firstNumber / secondNumber)
        }
    } else {
        firstNumber = Number(getResult())
        setResult(0)
        operator = op
    }
}

