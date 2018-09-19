function isPalindromes(str) {
    const n = str.split('').reverse().join('')
    return n === str
}

module.exports = isPalindromes