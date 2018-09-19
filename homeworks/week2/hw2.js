function alphaSwap(str) {
    let answer = ''
    for (let i=0; i<str.length; i++) {
        if (str[i] >= 'a' && str[i] <= 'z') {
            answer += str[i].toUpperCase()
        } else {
            answer += str[i].toLowerCase()
        }
    }
    return answer
}

module.exports = alphaSwap