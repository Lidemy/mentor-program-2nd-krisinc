const clientId = 'b3on0e2e4uood1xbbprf9v8tpfiup9'
const gameName = 'League%20of%20Legends'
const apiUrl = `https://api.twitch.tv/kraken/streams?game=${gameName}&limit=20&client_id=${clientId}`

document.addEventListener('DOMContentLoaded', ()=>{
    getStreams((res) => {
        const streams = res.streams
        const row = document.querySelector('.row')
        for( let stream of streams) {
            row.insertAdjacentHTML('afterbegin', renderStreams(stream))
        }
    })
})

function getStreams(cb) {
    const xhr = new XMLHttpRequest();

    xhr.open('GET', apiUrl, true)
    xhr.setRequestHeader('Accept', 'application/vnd.twitchtv.v5+json')

    xhr.onload = () => {
        if(xhr.status >= 200 && xhr.status < 400) {
            res = JSON.parse(xhr.responseText)
            cb(res)
        }
    }
    xhr.send()
}

// async function getData(cb) {
//     try{
//         const res = await axios(apiUrl)
//         cb(null, res)
//     }catch (err) {
//         console.log('something went wrong!')
//     }
// }
// getData((err, res) => {
//     const streams = res.data.streams
//     console.log(streams)
//     const row = document.querySelector('.row')
//     for(let stream of streams) {
//         row.insertAdjacentHTML('afterbegin',renderStreams(stream))
//     }
// })

function renderStreams(data) {
    return `
        <div class="col">
            <img class="preview" src="${data.preview.medium}" alt=""/>
            <div class="bottom">
                <img class="avatar" src="${data.channel.logo}" alt=""/>
                <div class="intro">
                    <div class="channel_name">${data.channel.status}</div>
                    <div class="name">${data.channel.display_name}</div>
                </div>
            </div>
        </div>

    `
}

