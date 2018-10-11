let clientId = 'b3on0e2e4uood1xbbprf9v8tpfiup9'
let gameName = 'League%20of%20Legends'
const apiUrl = `https://api.twitch.tv/kraken/streams?game=${gameName}&limit=20&client_id=${clientId}`

// let xhr = new XMLHttpRequest();
// xhr.open('get', apiUrl, true)
// xhr.send()

// xhr.onreadystatechange = function(cb) {
//     if(this.readyState === 4 && this.status === 200) {
//         var data = JSON.parse(this.responseText)
//         console.log(data)
//         cb(null, data)
//     }
// }

// getData((err, data) => {
//     const streams = data.streams

//     const row = document.querySelector('.row')
//     for( let stream of streams) {
//         row.append(getColumn(stream))
//     }
// })


async function getData(cb) {
    try{
        const res = await axios(apiUrl)
        cb(null, res)
    }catch (err) {
        console.log('something went wrong!')
    }
}
getData((err, res) => {
    const streams = res.data.streams
    console.log(streams)
    const row = document.querySelector('.row')
    for(let stream of streams) {
        row.insertAdjacentHTML('afterbegin',renderStreams(stream))
    }
})

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