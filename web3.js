
 <head>
  <link rel="shortcut icon" href="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/apple/325/woman-technologist-medium-light-skin-tone_1f469-1f3fc-200d-1f4bb.png" />
</head>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.7.4-rc.1/web3.min.js"></script>
<script>

async function connect() {
  if (window.ethereum) {
     await window.ethereum.request({ method: "eth_requestAccounts" });
     window.web3 = new Web3(window.ethereum);
     const account = web3.eth.accounts;
     //Get the current MetaMask selected/active wallet
     const walletAddress = account.givenProvider.selectedAddress;
     
     var div = document.getElementById('ip');
     div.innerHTML += " </b> or better to say <b>" + walletAddress; 
  
  } 
}

connect();
</script>
