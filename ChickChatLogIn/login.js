const wrapper = document.querySelector('.wrapper')
const login = document.querySelector('.btn-1')
const registration = document.querySelector('.btn-2')
const loginLink = document.querySelector('.btn-3')
const registrationLink = document.querySelector('.btn-4')
const tabs = document.querySelectorAll('.btn');
//tabs change
tabs.forEach((tab, index) => {
    tab.addEventListener('click', (e) => {
        tabs.classList.remove('active');
        tab.classList.add('active'); 
    });
});
//screen change
registration.addEventListener('click' , () => {
    wrapper.classList.add('active')
})

login.addEventListener('click' , () => {
    wrapper.classList.remove('active')
})

registrationLink.addEventListener('click' , () => {
    wrapper.classList.add('active')
})

loginLink.addEventListener('click' , () => {
    wrapper.classList.remove('active')
})