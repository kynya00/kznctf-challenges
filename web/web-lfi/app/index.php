<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reading Files</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<main>

  <?php
                  $file = $_GET['file'];
                  $content = file_get_contents('rules/' . $file);
  ?>

</main>
<style>

body {
  background-color: black;
  background-image: radial-gradient(
    rgba(0, 150, 0, 0.75), black 120%
  );
  height: 100vh;
  margin: 0;
  overflow: hidden;
  padding: 2rem;
  color: white;
  font: 1.3rem Inconsolata, monospace;
  text-shadow: 0 0 5px #C8C8C8;
  &::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: repeating-linear-gradient(
      0deg,
      rgba(black, 0.15),
      rgba(black, 0.15) 1px,
      transparent 1px,
      transparent 2px
    );
    pointer-events: none;
  }
}
::selection {
  background: #0080FF;
  text-shadow: none;
}
pre {
  margin: 0;
}


/* мигание текста*/

.blink {
    animation: blink 2s infinite; /* Параметры анимации */
   }
   @keyframes blink {
    from { opacity: 1; /* Непрозрачный текст */ }
    to { opacity: 0; /* Прозрачный текст */ }
   }

</style>

<body>
  <pre><output>webpack: Compiled successfully.
    webpack: Compiling...
    Hash: 33d8c38093d5e8261eac
    Version: webpack 3.11.0
    Time: 1337ms
                                   Asset       Size  Chunks                    Chunk Names
                              project.js    12.3 MB       0  [emitted]  [big]  project
                            dashboard.js    6.36 MB       1  [emitted]  [big]  dashboard
                             organize.js    5.29 MB       2  [emitted]  [big]  organize
                              proPens.js    4.92 MB       3  [emitted]  [big]  proPens
    0.81c79b4db476a98d272f.hot-update.js    87.4 kB       0  [emitted]         project
    1.81c79b4db476a98d272f.hot-update.js    7.94 kB       1  [emitted]         dashboard
    81c79b4db476a98d272f.hot-update.json   52 bytes          [emitted]
                           manifest.json  272 bytes          [emitted]
    [./app/javascript/common/components/Overlay.js] ./app/javascript/common/components/Overlay.js 2.42 kB {0} {1} [built]
  
  </output></pre>

  <h3 align="center" class="blink">My rules for data protection, read them...</h3>
  <a href="index.php?file=rules1.txt">echo Rules 1 >> /dev/null</a><br>
  <a href="index.php?file=rules2.txt">echo Rules 2 >> /dev/null</a><br>
  <a href="index.php?file=rules3.txt">echo Rules 3 >> /dev/null</a><br>
	<br>
	<br>
<p align="center"> <?php echo $content; ?> </p>  
</body>
</html>
