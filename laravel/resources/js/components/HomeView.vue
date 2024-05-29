<template>
    <main>
        <div id="home">
            <img src="" alt="" placeholder="Rechercher...">
            <div class="input-container">
                <input type="text" class="search">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="black" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 4H17M1 12H11" stroke="black" stroke-width="1.8" stroke-linecap="round" />
                    <path
                        d="M1 4C1 5.65685 2.34315 7 4 7C5.65685 7 7 5.65685 7 4C7 2.34315 5.65685 1 4 1C2.34315 1 1 2.34315 1 4Z"
                        stroke="white" stroke-width="1.8" stroke-linecap="round" />
                    <path
                        d="M11 12C11 13.6569 12.3431 15 14 15C15.6569 15 17 13.6569 17 12C17 10.3431 15.6569 9 14 9C12.3431 9 11 10.3431 11 12Z"
                        stroke="white" stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </div>

        </div>
    </main>
</template>

<style scoped>
.search {
    box-sizing: border-box;

    /* Auto layout */
    display: flex;
    flex-direction: row;
    align-items: flex-end;
    padding: 15px 10px;
    gap: 11px;
    isolation: isolate;

    width: 359px;
    height: 48px;

    border: 1px solid #254A3D;
    border-radius: 14px;

    /* Inside auto layout */
    flex: none;
    order: 0;
    flex-grow: 0;
}

.input-container {
    position: relative;
}

.input-container input {
    padding-right: 30px;
    /* Adjust padding as needed */
}

.input-container input::after {
    content: '';
    position: absolute;
    top: 50%;
    right: 8px;
    /* Adjust position as needed */
    transform: translateY(-50%);
    width: 18px;
    height: 16px;
    background-image: url('data:image/svg+xml;utf8,<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 4H17M1 12H11" stroke="black" stroke-width="1.8" stroke-linecap="round" /><path d="M1 4C1 5.65685 2.34315 7 4 7C5.65685 7 7 5.65685 7 4C7 2.34315 5.65685 1 4 1C2.34315 1 1 2.34315 1 4Z" stroke="white" stroke-width="1.8" stroke-linecap="round" /><path d="M11 12C11 13.6569 12.3431 15 14 15C15.6569 15 17 13.6569 17 12C17 10.3431 15.6569 9 14 9C12.3431 9 11 10.3431 11 12Z" stroke="white" stroke-width="1.8" stroke-linecap="round" /></svg>');
    background-repeat: no-repeat;
    background-size: contain;
    cursor: pointer;
    /* Adjust cursor style as needed */
}
</style>