# VnChat

Simple Realtime Chatting App Built With Native PHP & jQuery

## Website

*Please Note that the realtime method uses a LOT of queries so make sure your hosting is capable of doing so

## Usage

```
git clone https://github.com/KevinNVM/VnChat.git
```
*Don't forget to import chat-app-2(1).sql to your database*

*Change $db consts to your needs at [vnchat/utils/db.php]*

*Change const base_url to your website url at [vnchat/utils/const.php]*

## Known Bugs

```
Browser Compability : 
- Custom Scrollbar Doesn't Work On Firefox
- Glitchy Scroll on Chrome
- Stuck on session when the account is deleted from database. Fix : clear all session from your browser and refresh the page  
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://github.com/KevinNVM/VnChat/blob/main/LICENSE)
