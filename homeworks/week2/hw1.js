function stars(n) {
    const answer = []
    for (let i=1; i<=n; i++) {
        answer.push('*'.repeat(i))
    }
    return answer
}

module.exports = stars;