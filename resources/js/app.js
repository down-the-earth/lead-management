import './bootstrap';

import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import $ from 'jquery';

window.$ = window.jQuery = $;
console.log('App Js Loaded');
console.log('Echo :',window.Echo);
console.log('User ID', window.Laravel?.userId);

function showLiveAlert(notification){
          const container = document.getElementById('live-alert-container');
          if(!container){
                    return;
          }

          const alert = document.createElement('div');
          alert.className = 'alert alert-success alert-dismissable fade show shadow mb-2';
          alert.style.minWidth = "320px";
          alert.innerHTML = `<strong>
                    ${notification.title ?? 'New Alert'}
                    </strong>
                    <div class= "mt-1">
                    <a href="${notification.url}">${notification.message ?? ''}</a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert">
                    </button>
          `;
          container.appendChild(alert);
          // setTimeout(()=>{
          //           alert.remove();
          // },5000);
}
const userId = window.Laravel?.userId;

if(window.Echo && userId){
          window.Echo.private(`App.Models.User.${userId}`).notification((notification) => {
                    console.log('LIVE ALERT RECIEVED');
                    console.log(notification);
                    showLiveAlert(notification);
          });
          console.log(`Subcribing to App.Models.User.${userId}`);
          
}
