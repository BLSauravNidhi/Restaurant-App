// Debounce wrapper
function debounce(func, delay) {
    let timerId;
    return (...args) => {
        clearTimeout(timerId); // Clear previous timer
        timerId = setTimeout(() => {
            func.apply(this, args);
        }, delay); // Set new timer
    };
}


const openModalBtn = document.getElementById('openAddWorkerModalBtn');
const closeModalBtn = document.getElementById('closeAddWorkerModalBtn');
const modal = document.getElementById('AddWorkerModal');

openModalBtn.addEventListener('click', debounce(()=>{
    modal.classList.remove('hidden');
}, 100));

closeModalBtn.addEventListener('click', ()=>{
    modal.classList.add('hidden');
});

const closeModal = ()=>{
    modal.classList.add('hidden');
};

window.addEventListener('click', (event)=>{
    if(event.target==modal){
        closeModal();
    }
});