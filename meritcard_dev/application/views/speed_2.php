<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>vedio speed demo </title>
</head>
<body>
    <div>
        	<video style = 'width:100%'  id="video-active"  style = 'bodder:1px solid red' controls autoplay  >
		<!--<source src="https://www.learningcontainer.com/wp-content/uploads/2020/05/sample-mp4-file.mp4">-->
		<source src="<?= base_url('/assets/video/Abash_Abet_1.mp4') ?>" type="video/mp4">
	</video>
    </div>
		<div style="text-align: center; display: none ">
			<h1>video speed test </h1>
			<h1>video duration is == <span id= 'v_duration'></span> </h1>
			<h5> net current speed is == <span id= 'v_speed'></span> </h5>
			<h5> net previace speed is == <span id= 'n_speed'></span> </h5>
			<hr style= "background-color: chartreuse ;padding: 10px;">
			<p id = "progress_2"></p>
	        <button onclick = "my_fun()">get Time</button>
	        <button onclick = "palys()">get speed</button>
		<hr style= "background-color: chartreuse ;padding: 10px; margin:5px;">
				
		
	
<div>Current Time : <span  id="currentTime">0</span></div>
<div>Total time : <span id="totalTime">0</span></div>
		</div>
		
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  
<script>
	//JUST AN EXAMPLE, PLEASE USE YOUR OWN PICTURE!
//var imageAddr = "https://i.ibb.co/sPbbkkZ/pexels-lisa-1540258.jpg"; 

 var imageAddr ="https://media3.giphy.com/media/PIIfwFGypvnlS/200w.gif?cid=ecf05e47af2jsgshmq6u6pvxrp8lv9a9e7199snayfbx9bl5&rid=200w.gif&ct=g";
var downloadSize = 10500000; //bytes

function ShowProgressMessage(msg) {
    if (console) {
        if (typeof msg == "string") {
            console.log(msg);
        } else {
            for (var i = 0; i < msg.length; i++) {
                console.log(msg[i]);
            }
        }
    }
    
    var oProgress = document.getElementById("progress");
    if (oProgress) {
        var actualHTML = (typeof msg == "string") ? msg : msg.join("<br />");
        oProgress.innerHTML = actualHTML;
    }
}

function InitiateSpeedDetection() {
    ShowProgressMessage("Loading the image, please wait...");
    window.setTimeout(MeasureConnectionSpeed, 1);
};    

if (window.addEventListener) {
    window.addEventListener('load', InitiateSpeedDetection, false);
} else if (window.attachEvent) {
    window.attachEvent('onload', InitiateSpeedDetection);
}

function MeasureConnectionSpeed() {
    var startTime, endTime;
    var download = new Image();
    download.onload = function () {
        endTime = (new Date()).getTime();
        showResults();
    }
    
    download.onerror = function (err, msg) {
        ShowProgressMessage("Invalid image, or error downloading");
    }
    
    startTime = (new Date()).getTime();
    var cacheBuster = "?nnn=" + startTime;
    download.src = imageAddr + cacheBuster;
    
    function showResults() {
        var duration = (endTime - startTime) / 1000;
        var bitsLoaded = downloadSize * 8;
        var speedBps = (bitsLoaded / duration).toFixed(2);
        var speedKbps = (speedBps / 1024).toFixed(2);
        var speedMbps = (speedKbps / 1024).toFixed(2);
          
           var divs = document.getElementById("v_speed");
   
                 divs.innerHTML = speedMbps;                  
                                   
        ShowProgressMessage([
            "Your connection speed is:", 
            speedBps + " bps", 
            speedKbps + " kbps", 
            speedMbps + " Mbps"
        ]);
    }
}

       
		
                ///////////////////////////////
            
         setInterval(function(){
                        $('#currentTime').html($("#video-active").get(0).currentTime);
                        $('#totalTime').html($("#video-active").get(0).duration);    
                      
                        },1000);   
            setInterval(function(){
                InitiateSpeedDetection();
                palys(); 
                        },10000);   
        function my_fun(){
      let m_time =  Math.floor($("#video-active").get(0).currentTime);
      console.log('jk check')
      console.log($("#video").get(0)); 
      alert("VIDEO TIME IS == "+ m_time);                          
      return false; 
  }
                                   
       function palys(){
                
                  
                  var v_1 = "<?= base_url('/assets/video/Abash_Abet_1.mp4') ?>";
                  var v_2 = "<?= base_url('/assets/video/Abash_Abet_2.mp4') ?>";
                  var v_3 = "<?= base_url('/assets/video/Abash_Abet_3.mp4') ?>";
                  var v_4 = "<?= base_url('/assets/video/Abash_Abet_4.mp4') ?>";
               
                
                
           /*var urls = ['https://www.learningcontainer.com/wp-content/uploads/2020/05/sample-mp4-file.mp4',
           'https://s3.eu-central-1.amazonaws.com/pipe.public.content/short.mp4',
            'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4'];*/
             
            var urls = [v_1,v_2,v_3,v_4];
            
               let m_speed =   document.getElementById("v_speed").innerHTML;
                   m_speed =  Math.floor(m_speed);
                let m_time =  Math.floor($("#video-active").get(0).currentTime);            
                 
                  var duration = $("#video-active").get(0).duration;
                     if(m_time >= duration){
                        
                     }else{
                          $('#v_duration').html(duration); 
                     }                              
                 
                    console.log( m_speed +' == m_speed');
                    console.log(m_time +' =jk= '+ duration);
                                
                  let old_url =  $('#n_speed').html();
                  
                  let cust_url = 0;                          
                    if( (m_speed >= '0') && (m_speed < '10'))                      
                    {   console.log("speed under 1 to 10  == "+ m_speed );
                      cust_url = '0';
                        
                    }else  if( (m_speed >= '11') && (m_speed < '50'))
                            {   console.log("speed under 11 to 50  == "+ m_speed );
                                     cust_url = '1';
                                 }else  if( (m_speed >= '50') && (m_speed < '100')) {
                                          console.log("speed under 50 to 100  == "+ m_speed );
                                        cust_url = '2';
                                 }else{
                                      console.log("speed under 100 to 2000  == "+ m_speed );
                                        cust_url = '3';
                                 }
                    if(old_url == cust_url)
                    {
                        return false;
                    }else{
                        $('#n_speed').html(cust_url);
                    }
                    
                                                              
                                                           
                    
                       var video = document.getElementById('video-active');
                        video.src = urls[cust_url];
                        video.load();
                        $("#video-active").get(0).currentTime = m_time; 
                        video.play();                  
                                 
                                 
       } 
        
        
</script>
</body>
</html>