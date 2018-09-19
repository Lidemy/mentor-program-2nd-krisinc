function add(a, b) {
    const arrA = a.split('').reverse()
    const arrB = b.split('').reverse()
    const answer = ['']
    const length = Math.max(arrA.length, arrB.length)

    for (let i=0; i<length; i++) {
        const n = Number(arrA[i] || 0) + Number(arrB[i] || 0) + (answer[i] || 0)
        answer[i] = n % 10
        answer[i+1] = Math.floor(n / 10) || ''
    }

    return answer.reverse().join('')
}

module.exports = add;