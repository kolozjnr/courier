
<?php include 'db_connect.php' ?>
    <?php include 'header.php';?>

    <style>
      :root {
  --white: #fff;
  --green: #4caf50;
  --blue: #2896f3;
  --yellow: #fbc107;
  --red: #f55153;
  --transition-duration: 0.25s;
}

*,
::after,
::before {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html {
  font-size: 62.5%;
}

.buttons-container {
  display: flex;
  align-items: center;
  height: calc(100vh - 10.4rem);
  flex-wrap: wrap;
  justify-content: center;
  padding: 2.4rem;
}
.buttons-container .btn-toast {
  padding: 0.8rem 1.6rem;
  font-size: 1.6rem;
  transition: filter var(--transition-duration);
  cursor: pointer;
  color: #fff;
}
.buttons-container .btn-toast:not(:last-child) {
  margin-right: 0.8rem;
}
.buttons-container .btn-toast[data-type=success] {
  background-color: var(--green);
}
.buttons-container .btn-toast[data-type=system] {
  background-color: var(--blue);
}
.buttons-container .btn-toast[data-type=warning] {
  background-color: var(--yellow);
}
.buttons-container .btn-toast[data-type=error] {
  background-color: var(--red);
}
.buttons-container .btn-toast:hover {
  filter: opacity(0.9);
}

.toasts-container {
  position: fixed;
  top: 0;
  right: 0;
  padding: 2.4rem;
  z-index: 100;
}
.toasts-container .toast {
  position: relative;
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 50rem;
  min-width: 28rem;
  background-color: #121212;
  border-radius: 1.2rem;
  padding: 2.4rem;
  margin-bottom: 2.4rem;
  opacity: 0;
  transform: translateX(100%);
  animation: toast-opening var(--transition-duration) ease-in-out forwards;
  overflow-x: hidden;
}
.toasts-container .toast:not(.active) {
  animation-name: toast-closing;
  animation-duration: 0.35s;
}
.toasts-container .toast .t-icon {
  margin-right: 2.4rem;
}
.toasts-container .toast .t-icon svg {
  fill: var(--white);
  width: 2.4rem;
  height: 2.4rem;
}
.toasts-container .toast .t-message {
  margin-right: 2.4rem;
  color: var(--white);
  line-height: 2rem;
  font-size: clamp(1.2rem, 1.8vw, 1.6rem);
}
.toasts-container .toast .t-close svg {
  fill: var(--white);
  opacity: 1;
  width: 1.8rem;
  height: 1.8rem;
  transition: opacity var(--transition-duration);
  cursor: pointer;
}
@media (hover: hover) {
  .toasts-container .toast .t-close svg {
    opacity: 0.5;
  }
}
.toasts-container .toast .t-close:hover svg {
  opacity: 1;
}
.toasts-container .toast .t-progress-bar {
  display: block;
  position: absolute;
  bottom: 0;
  left: 0;
  height: 6px;
  width: 100%;
  border-radius: 0 0 0 0.5rem;
  background-color: rgba(255, 255, 255, 0.5);
  animation: progress-bar-animation linear forwards var(--toast-duration, 3000ms);
  transform-origin: left;
}
.toasts-container .toast.success {
  background-color: var(--green);
}
.toasts-container .toast.system {
  background-color: var(--blue);
}
.toasts-container .toast.warning {
  background-color: var(--yellow);
}
.toasts-container .toast.error {
  background-color: var(--red);
}

@keyframes toast-opening {
  from {
    opacity: 0;
    transform: translateX(100%);
  }
  to {
    opacity: 1;
    transform: translateX(0%);
  }
}
@keyframes toast-closing {
  0% {
    opacity: 1;
    transform: translateX(0%);
  }
  75% {
    max-height: 15rem;
    padding: 2.4rem;
    opacity: 0;
    transform: translateX(100%);
  }
  100% {
    max-height: 0;
    padding: 0;
    transform: translateX(100%);
  }
}
@keyframes progress-bar-animation {
  to {
    transform: scaleX(0);
  }
}



/* Backdrop styling */
.backdrop {
    display: none; /* Hidden by default */
    position: fixed; /* Sit on top of the page content */
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
    z-index: 9999; /* Specify a stack order in case you're using a different order for other elements */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 1.5em;
}

/* Loader animation */
.loader {
    border: 8px solid #f3f3f3; /* Light grey */
    border-top: 8px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 60px;
    height: 60px;
    animation: spin 2s linear infinite;
    margin-bottom: 20px; /* Space between loader and text */
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Optional: Center the text below the loader */
.backdrop p {
    margin-top: 10px;
}
.transcom, #scrollUp, .fa-box{
  background-color: #D81320 !important;
}

    </style>
    
  <link rel="stylesheet" href="assets/css/adminlte.css">
    <main>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

<div class="buttons-container d-none">
  <p class="btn-toast success"
     data-type="success"
     data-icon="check-circle"
     data-message='Success toast with infinite duration - data-duration="0"'
     data-duration="0">success toast</p>

  <!-- <p class="btn-toast system"
     data-type="system"
     data-icon="info-circle"
     data-message="System toast with default duration">system toast</p> -->

  <p class="btn-toast warning"
     data-type="warning"
     data-icon="exclamation-triangle"
     data-message="Warning toast with default duration">warning toast</p>

  <p class="btn-toast error"
     data-type="error"
     id="toast_err"
     data-icon="exclamation-circle"
     data-message='No records found for this Tracking No:'
     data-duration="5000">error toast</p>
</div>
      <!-- hero-areav4-start -->
      <section class="hero-areav4" data-background="assets/img/hero/hero4.jpg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="hero4-title">
                <h2>Tracker Page</h2>
                <ul>
                  <li><a href="/">Home</a></li>
                  <li><i class="fa-solid fa-angles-right"></i></li>
                  <li>Tracker</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="works-area s-overfellow pt-120 pb-100">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="section-title text-center mb-50 wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".3s">
                <span>Keep tabs on your parcels</span>

                <h2>
                  Track & Trace
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="contact-form-area pb-70">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 pb-50">
                <div>
                  <div class="section-title section-titlev4 mb-20">
                    <h5 class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".3s">
                      Enter Tracking Number
                    </h5>
                  </div>
                  <div class="contact-form transport-form chose-form wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".3s">
                    <form action="#">
                      <input type="text" name="ref_no" id="ref_no" placeholder="Tracking number Eg: (AED-56757675)" required />
                    </form>
                    <br />
                    <div>
                      <!-- <a class="transcom" href="tracker">
                        Track Shipment
                      </a> -->
                      <button type="button" style="background: #d81320; border:none"  id="track-btn" class="transcom">
                      Track Shipment
                            <!-- <i class="fa fa-search"></i> -->
                        </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2">
              <p class="shipm" style="text-align: center; font-size: 20px; color: #d81320; display:none" >Shipment Details</p>
              <style>
                .dtime, .timeline{
                  font-size: 20px;
                  color: #000;
                }
              </style>
                <div class="timeline" style="font-size: 20px" id="parcel_history">
                
                </div>
              </div>
            </div>
          </div>
          <div id="clone_timeline-item" class="d-none">
            <div class="iitem">
                <i class="fas fa-box " style="backgorund-color: #d81320; color: white"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <span class="dtime">12:05</span></span>
                  <div class="timeline-body">
                    asdasd
                  </div>
                </div>
              </div>
          </div>
          </div>
        </div>

        <div id="backdrop" class="backdrop d-none">
          <div class="loader"></div>
          <p>Searching...</p>
        </div>

        <?php include 'footer.php';?>
      </section>
    </main>
    
<script>
	function track_now(){
    // var ref = $('#ref_no').val(
      
    // )
    // alert(ref)
    // return;
		//start_load()
    document.getElementById('backdrop').style.display = 'block'; // To show
    var toast_err = document.getElementById("toast_err");
		var tracking_num = $('#ref_no').val()
		if(tracking_num == ''){
			$('#parcel_history').html('')
			//end_load()
      document.getElementById('backdrop').style.display = 'none'; // To hide
      toast_err.setAttribute("data-message", "Tracking Number is required");
      toast_err.click()
		}else{
			$.ajax({
				url:'ajax.php?action=get_parcel_heistory',
				method:'POST',
				data:{ref_no:tracking_num},
				error:err=>{
					console.log(err)
					//alert_toast("An error occured",'error')
					//end_load()
        document.getElementById('backdrop').style.display = 'none'; // To hide
				},
				success:function(resp){
          console.log(resp)
          setTimeout(function(){
          document.querySelector(".shipm").style.display = "block";
					if(typeof resp === 'object' || Array.isArray(resp) || typeof JSON.parse(resp) === 'object'){
						resp = JSON.parse(resp)
						if(Object.keys(resp).length > 0){
							$('#parcel_history').html('')
							Object.keys(resp).map(function(k){
								var tl = $('#clone_timeline-item .iitem').clone()
								tl.find('.dtime').text(resp[k].date_created)
								tl.find('.timeline-body').text(resp[k].status)
								$('#parcel_history').append(tl)
							})
						}
          },5000);
					}else if(resp == 2){
						//alert_toast('Unkown Tracking Number.',"error")
            toast_err.setAttribute("data-message", "Unkown Tracking Number.");
            toast_err.click()
					}
				}
				,complete:function(){
					//end_load()
        document.getElementById('backdrop').style.display = 'none'; // To hide
				}
			})
		}
	}
	$('#track-btn').click(function(){
		track_now()
	})
	$('#ref_no').on('search',function(){
		track_now()
	})












  "use strict";
// Below code can be easily used in vanilla js, you just need to copy below code in your js file, and remove all interfaces & types. (': void', ': string' etc... are types too)
class SwipeHandler {
    getSwipeDirection({ touchstartX, touchstartY, touchendX, touchendY }) {
        const delx = touchendX - touchstartX;
        const dely = touchendY - touchstartY;
        if (Math.abs(delx) > Math.abs(dely)) {
            return delx > 0 ? 'right' : 'left';
        }
        if (Math.abs(delx) < Math.abs(dely)) {
            return dely > 0 ? 'down' : 'up';
        }
        return 'tap';
    }
}
const svgIcons = [
    {
        name: 'check-circle',
        svg: `
      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'>
        <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
      </svg>
    `,
    },
    {
        name: 'info-circle',
        svg: `
      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'>
        <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
      </svg>
    `,
    },
    {
        name: 'exclamation-circle',
        svg: `
      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'>
        <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z'/>
      </svg>
    `,
    },
    {
        name: 'exclamation-triangle',
        svg: `
      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'>
        <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
      </svg>
    `,
    },
    {
        name: 'x-lg',
        svg: `
      <svg xmlns='http://www.w3.org/2000/svg' class='t-close' width='16' height='16' fill='currentColor' viewBox='0 0 16 16'>
        <path d='M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z'/>
      </svg>
    `,
    },
];
class ToastsFactory {
    constructor(swipeHandler) {
        this.swipeHandler = swipeHandler;
        this.createToastsContainer();
        // below line enable toasts creation from buttons; can be removed if useless
        this.createToastsFromButtons();
    }
    createToastsContainer() {
        const toastsContainer = document.createElement('div');
        toastsContainer.classList.add('toasts-container');
        this.toastsContainer = toastsContainer;
        document.body.appendChild(toastsContainer);
    }
    createToastsFromButtons() {
        document.addEventListener('click', (e) => {
            // check is the right element clicked
            if (!e.target.matches('.btn-toast'))
                return;
            const dataset = e.target.dataset;
            const config = {
                type: dataset.type,
                icon: dataset.icon,
                message: dataset.message,
                duration: dataset.duration ? parseInt(dataset.duration, 10) : undefined,
            };
            this.createToast(config);
        }, false);
    }
    createToast({ type, icon, message, duration }) {
        const toast = this.createToastContainer(type);
        this.addToastElement(toast, 't-icon', svgIcons.find((item) => item.name === icon).svg);
        this.addToastElement(toast, 't-message', message);
        this.addCloseButton(toast);
        const progressBar = this.getProgressBar(duration);
        progressBar && toast.appendChild(progressBar);
        // toasts can be closed on right swipe, comment this line if it's useless in your case
        this.observeSwipe(toast, 'right');
        this.toastsContainer.appendChild(toast);
        // if duration is 0, toast message will not be closed automatically
        if (!progressBar)
            return;
        progressBar.onanimationend = () => this.removeToast(toast);
    }
    createToastContainer(type) {
        const toast = document.createElement('div');
        toast.classList.add('toast', type, 'active');
        return toast;
    }
    addToastElement(toast, className, content) {
        const element = document.createElement('div');
        element.classList.add(className);
        element.innerHTML = content;
        toast.appendChild(element);
        return element;
    }
    addCloseButton(toast) {
        const closeButton = this.addToastElement(toast, 't-close', svgIcons.find((icon) => icon.name === 'x-lg').svg);
        closeButton.onclick = () => this.removeToast(toast);
    }
    getProgressBar(duration) {
        // duration is infinite => no progress bar
        if (duration === 0)
            return;
        const progressBar = document.createElement('div');
        progressBar.classList.add('t-progress-bar');
        duration && progressBar.style.setProperty('--toast-duration', `${duration}ms`);
        return progressBar;
    }
    removeToast(toast) {
        toast.classList.remove('active');
        // we wait for the end of the animation to remove the element from the DOM
        toast.onanimationend = (evt) => {
            // needed to filter progressBar animation
            evt.target === toast && toast.remove();
        };
    }
    observeSwipe(toast, direction) {
        let touchstartX = 0, touchstartY = 0, touchendX = 0, touchendY = 0;
        toast.addEventListener('touchstart', (event) => {
            // needed to avoid weird behavior on swipe
            window.document.body.style.overflow = 'hidden';
            touchstartX = event.changedTouches[0].screenX;
            touchstartY = event.changedTouches[0].screenY;
        }, { passive: true });
        toast.addEventListener('touchend', (event) => {
            window.document.body.style.overflow = 'unset';
            touchendX = event.changedTouches[0].screenX;
            touchendY = event.changedTouches[0].screenY;
            const swipeConfig = {
                touchstartX,
                touchstartY,
                touchendX,
                touchendY,
            };
            this.swipeHandler.getSwipeDirection(swipeConfig) === direction && this.removeToast(toast);
        }, { passive: true });
    }
}
const swipeHandler = new SwipeHandler();
const toastsFactory = new ToastsFactory(swipeHandler);
// manual creation from method
// toastsFactory.createToast({
//     type: 'system',
//     icon: 'info-circle',
//     message: 'Check that toast buddy! 🚀',
//     duration: 5000,
// });

</script>
</html>
