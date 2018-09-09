function join(str, concatStr) {
    let answer = ''
    for( let i=0; i<str.length; i++) {
        if(i == str.length - 1) {
            answer += str[i]
        }else {
            answer += str[i] + concatStr
        }
    }
    return answer
}

function repeat(str, times) {
    let answer = ''
    for (let i=1; i<=times; i++){
        answer += str
    }
    return answer
}
