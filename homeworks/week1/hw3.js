function reverse(str) {
    var answer = ''
    for (let i=str.length - 1; i>=0; i--) {
        answer += str[i]
    }
    return answer
}

console.log(reverse("yoyoyo"))