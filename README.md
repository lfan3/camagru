#todo#
- see the validation of entree
- bitnami apps: https://docs.bitnami.com/aws/infrastructure/lamp/administration/create-custom-application-php/



- delete commentary part
- ajouter un alert pour dire quil faut devenir membre pour commenter
- minajs.php FdeletImg fiveImges (10 or 15)or zoomout
- footer responsive if the screen is very small

source:
https://www.w3schools.com/php/php_file_upload.asp
https://stackoverflow.com/questions/10906734/how-to-upload-image-into-html5-canvas


- not member can not write in the formule
- when delike not need to refresh page



pour ameliorer
- miniaJs.php change to pure js
- when we give a commentary, let the page stay on the commentary
- profile photo
- comment box height change according the input text
- il faut changer gib number 
- dans publicgALEERY,bigC.js THE ajax can be used only once.
- change alert to popup
- gallery affichage depuis php directement avec get all snapshots 
- datase/ updateprof dbupdate the userpart can be improved in dbupdate
- after change the profile, telle user that the profile has been changed

questions?
est ce qu4il faut masquer le url dans email?

#bitnamie
- fresh frequence : opache.revalidate_freq = 0;
#image:
flaticon

#debug with bitnamie
- apache2/logs 
    tail error_log
- function blabal($bla,$bla2 = 0){}
- montageTest.php
- probleme pour recuperer les x y des filters

#base64
- base64 code endommage: 
in the base64 code, there is no ' '.
$content = str_replace('data:image/png;base64,', '', $content);
$content = str_replace(' ', '+', $content);

#javascript new thing
- IIFE solution for eventhandler in front/montage.php
- canvas draw image, video
- getUserMedia
- mail confirmation
- offsetLeft div.offsetWidth
- ajax httpx
- Object keys and array keys are not exactly the same
> const object1 = {
    a: 'somestring',
    b: 42,
    c: false
    };
    console.log(Object.keys(object1));
> const array1 = ['a', 'b', 'c'];
    const iterator = array1.keys();
- callback function to create synchrone
> function salutation(name) {
    alert('Bonjour ' + name);
    }
    function processUserInput(callback) {
        var name = prompt('Entrez votre nom.');
        callback(name);
    }
    processUserInput(salutation);

-window.location.href.indexOf("toto");
- problme de viter les array : https://stackoverflow.com/questions/1232040/how-do-i-empty-an-array-in-javascript

#php new things
- php:// manual
- use jsons.stingify (object), in the php, we need to transfer the object into array: array = (array)object;



//changer pas mal adresse des fichiers, donc possible des bug de lapartie d'utilisateur

