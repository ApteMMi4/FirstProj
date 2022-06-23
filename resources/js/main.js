if (document.querySelector('.accounts')) {
    const accountsBtn = document.querySelectorAll(".accounts__tab-btn");
    const accountsItems = document.querySelectorAll(".accounts__tab-content");

    accountsBtn.forEach(onTabClick);

    function onTabClick(item) {
        item.addEventListener("click", function () {
            let currentBtn = item;
            let tabId = currentBtn.getAttribute("data-acc-tab");
            let currentTab = document.querySelector(tabId);

            if (!currentBtn.classList.contains('active')) {
                accountsBtn.forEach(function (item) {
                    item.classList.remove('active');
                });

                accountsItems.forEach(function (item) {
                    item.classList.remove('active');
                });

                currentBtn.classList.add('active');
                currentTab.classList.add('active');
            }
        });
    }

    document.querySelector('.accounts__tab-btn').click();
}

if(document.querySelector('.pay-cur')) {
    const payListItems = document.querySelectorAll('.pay-cur-list-item');
    const payCur = document.querySelectorAll('.pay-cur-span')

    payListItems.forEach (item => {
        item.addEventListener('click', ()=> {
            payCur.forEach(pcItem => {
                pcItem.textContent = item.textContent;
            });
        });
    });

}