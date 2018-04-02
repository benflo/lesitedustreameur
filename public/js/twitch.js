$.ajax({
    type: 'GET',
    url: 'https://api.twitch.tv/helix/games/top',
    headers: {
        'Client-ID': 'evp0w2mgnhzlfddg9e5d360dkzb9xj'
    },
    success: function(data) {
        console.log(data);
    }
});