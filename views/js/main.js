const grid = document.querySelector('.grid');
const watcher = document.querySelector('.watcher');
const btnUp = document.querySelector('.btn-up');
let count = 0;

const dataArray = async (count) => {
    const header = new Headers({
        'Authorization': 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJiNmRlMTk0ODYyNmQzNzNkZjFhYzkyN2I1ZGZhZGEyYSIsInN1YiI6IjYyOTRjZGYyZjU0ODM2MDA2NjA5YThlNyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.PYD0EbtJZwDUg1ZsB_HjK9eTdNP6Z-FMGsPITKLnCO4'
    });
    const init = {
        method: 'GET',
        headers: header,
        mode: 'cors',
        cache: 'default'
    };
    const result = await fetch('https://api.themoviedb.org/3/discover/movie?language=fr-FR&with_genres=28&page='+ count, init);
    const data = await result.json();
    return data.results;
}

const addContent = async (count) => {

    const data = await dataArray(count);

    data.forEach(e => {
        const card = document.createElement('div');
        card.classList.add('card');
        card.innerHTML = '<h2>' + e.title + '</h2><img src="https://image.tmdb.org/t/p/w400'+ e.poster_path +'" alt="" srcset=""><p>'+ e.release_date +'</p>';
        grid.appendChild(card);
    });
}

const handleIntersect = entries => {
    if(entries[0].isIntersecting){
        count++;
        addContent(count)
    }
}
const newObserver = new IntersectionObserver(handleIntersect);
newObserver.observe(watcher);

btnUp.addEventListener('click', ()=>{
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
})