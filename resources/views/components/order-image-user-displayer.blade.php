<div class="user-order-image-container">
    @switch($status)
    @case(1)
    <svg class="user-order-svg" width="42" height="29" viewBox="0 0 42 29" xmlns="http://www.w3.org/2000/svg">
        <path d="M3.81818 0H30.5455V7.25H36.2727L42 14.5V23.5625H38.1818C38.1818 25.0046 37.5784 26.3877 36.5043 27.4074C35.4303 28.4271 33.9735 29 32.4545 29C30.9356 29 29.4788 28.4271 28.4048 27.4074C27.3307 26.3877 26.7273 25.0046 26.7273 23.5625H15.2727C15.2727 25.0046 14.6693 26.3877 13.5952 27.4074C12.5212 28.4271 11.0644 29 9.54545 29C8.02649 29 6.56973 28.4271 5.49566 27.4074C4.42159 26.3877 3.81818 25.0046 3.81818 23.5625H0V3.625C0 1.61312 1.71818 0 3.81818 0ZM30.5455 9.96875V14.5H39.0791L35.3182 9.96875H30.5455ZM9.54545 20.8438C8.78597 20.8438 8.05759 21.1302 7.52056 21.6401C6.98352 22.1499 6.68182 22.8414 6.68182 23.5625C6.68182 24.2836 6.98352 24.9751 7.52056 25.4849C8.05759 25.9948 8.78597 26.2812 9.54545 26.2812C10.3049 26.2812 11.0333 25.9948 11.5704 25.4849C12.1074 24.9751 12.4091 24.2836 12.4091 23.5625C12.4091 22.8414 12.1074 22.1499 11.5704 21.6401C11.0333 21.1302 10.3049 20.8438 9.54545 20.8438ZM32.4545 20.8438C31.6951 20.8438 30.9667 21.1302 30.4296 21.6401C29.8926 22.1499 29.5909 22.8414 29.5909 23.5625C29.5909 24.2836 29.8926 24.9751 30.4296 25.4849C30.9667 25.9948 31.6951 26.2812 32.4545 26.2812C33.214 26.2812 33.9424 25.9948 34.4794 25.4849C35.0165 24.9751 35.3182 24.2836 35.3182 23.5625C35.3182 22.8414 35.0165 22.1499 34.4794 21.6401C33.9424 21.1302 33.214 20.8438 32.4545 20.8438ZM13.3636 18.125L24.8182 7.25L22.1264 4.67625L13.3636 12.9956L9.37364 9.2075L6.68182 11.7812L13.3636 18.125Z"/>
        </svg>
        
        @break
    @case(3)
    <svg class="user-order-svg" width="42" height="29" viewBox="0 0 42 29" xmlns="http://www.w3.org/2000/svg">
        <path d="M3.81818 0H30.5455V7.25H36.2727L42 14.5V23.5625H38.1818C38.1818 25.0046 37.5784 26.3877 36.5043 27.4074C35.4303 28.4271 33.9735 29 32.4545 29C30.9356 29 29.4788 28.4271 28.4048 27.4074C27.3307 26.3877 26.7273 25.0046 26.7273 23.5625H15.2727C15.2727 25.0046 14.6693 26.3877 13.5952 27.4074C12.5212 28.4271 11.0644 29 9.54545 29C8.02649 29 6.56973 28.4271 5.49566 27.4074C4.42159 26.3877 3.81818 25.0046 3.81818 23.5625H0V3.625C0 1.61312 1.71818 0 3.81818 0ZM30.5455 9.96875V14.5H39.0791L35.3182 9.96875H30.5455ZM9.54545 20.8438C8.78597 20.8438 8.05759 21.1302 7.52056 21.6401C6.98352 22.1499 6.68182 22.8414 6.68182 23.5625C6.68182 24.2836 6.98352 24.9751 7.52056 25.4849C8.05759 25.9948 8.78597 26.2812 9.54545 26.2812C10.3049 26.2812 11.0333 25.9948 11.5704 25.4849C12.1074 24.9751 12.4091 24.2836 12.4091 23.5625C12.4091 22.8414 12.1074 22.1499 11.5704 21.6401C11.0333 21.1302 10.3049 20.8438 9.54545 20.8438ZM32.4545 20.8438C31.6951 20.8438 30.9667 21.1302 30.4296 21.6401C29.8926 22.1499 29.5909 22.8414 29.5909 23.5625C29.5909 24.2836 29.8926 24.9751 30.4296 25.4849C30.9667 25.9948 31.6951 26.2812 32.4545 26.2812C33.214 26.2812 33.9424 25.9948 34.4794 25.4849C35.0165 24.9751 35.3182 24.2836 35.3182 23.5625C35.3182 22.8414 35.0165 22.1499 34.4794 21.6401C33.9424 21.1302 33.214 20.8438 32.4545 20.8438ZM13.3636 18.125L24.8182 7.25L22.1264 4.67625L13.3636 12.9956L9.37364 9.2075L6.68182 11.7812L13.3636 18.125Z"/>
        </svg>
        
        @break
    @default
    <svg class="user-order-svg" width="42" height="28" viewBox="0 0 42 28" xmlns="http://www.w3.org/2000/svg">
        <path d="M4.86316 16.625L3.53684 14H12.8211L11.76 11.375H3.09474L1.76842 8.75H15.5621L14.5011 6.125H1.52084L0 3.5H6.63158C6.63158 2.57174 7.00421 1.6815 7.6675 1.02513C8.33078 0.368749 9.23039 0 10.1684 0H31.3895V7H36.6947L42 14V22.75H38.4632C38.4632 24.1424 37.9042 25.4777 36.9093 26.4623C35.9144 27.4469 34.5649 28 33.1579 28C31.7509 28 30.4014 27.4469 29.4065 26.4623C28.4116 25.4777 27.8526 24.1424 27.8526 22.75H20.7789C20.7789 24.1424 20.22 25.4777 19.2251 26.4623C18.2301 27.4469 16.8807 28 15.4737 28C14.0666 28 12.7172 27.4469 11.7223 26.4623C10.7274 25.4777 10.1684 24.1424 10.1684 22.75H6.63158V16.625H4.86316ZM33.1579 25.375C33.8614 25.375 34.5361 25.0984 35.0336 24.6062C35.5311 24.1139 35.8105 23.4462 35.8105 22.75C35.8105 22.0538 35.5311 21.3861 35.0336 20.8938C34.5361 20.4016 33.8614 20.125 33.1579 20.125C32.4544 20.125 31.7797 20.4016 31.2822 20.8938C30.7847 21.3861 30.5053 22.0538 30.5053 22.75C30.5053 23.4462 30.7847 24.1139 31.2822 24.6062C31.7797 25.0984 32.4544 25.375 33.1579 25.375ZM35.8105 9.625H31.3895V14H39.2766L35.8105 9.625ZM15.4737 25.375C16.1772 25.375 16.8519 25.0984 17.3494 24.6062C17.8468 24.1139 18.1263 23.4462 18.1263 22.75C18.1263 22.0538 17.8468 21.3861 17.3494 20.8938C16.8519 20.4016 16.1772 20.125 15.4737 20.125C14.7702 20.125 14.0955 20.4016 13.598 20.8938C13.1005 21.3861 12.8211 22.0538 12.8211 22.75C12.8211 23.4462 13.1005 24.1139 13.598 24.6062C14.0955 25.0984 14.7702 25.375 15.4737 25.375Z"/>
        </svg>
        
    @endswitch
</div>