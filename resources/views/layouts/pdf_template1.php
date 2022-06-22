<!doctype html>
<html>
<head>
   <style>
  @page {
    margin-right: 0mm;
     margin-left: 0mm;
      margin-top: 0mm;
       margin-bottom: 0;
  }

  body {
    font: 9pt sans-serif;
    line-height: 1.3;

    /* Avoid fixed header and footer to overlap page content */
    margin-top: 100px;
    margin-bottom: 150px;
  }

  #header {
    position: fixed;
    top: 0;
    width: 100%;
    height: 100px;
    /* For testing */
    background: yellow; 
    opacity: 0.5;
  }

  #footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 50px;
    font-size: 6pt;
    color: #777;
    /* For testing */
    background: red; 
    opacity: 0.5;
  }
html,body
        {
            height: 100%;
            
        }
  /* Print progressive page numbers */
  .page-number:before {
    /* counter-increment: page; */
    content: "Pagina " counter(page);
  }

</style>
</head>




  <body style="padding:10px">

  <header id="header" style='text-align: center'>
<table style='width:100%'>
  <tbody>
    <tr>
      <td style='width:18cm'>
        <h1>QForms</h1>
<h4>Bangalore</h4>
      </td>
            <td><h5>#date</h5></td>

    </tr>
  </tbody>


</table>
  </header>

  <footer id="footer" style='text-align: center;color:black'>#footer_tmp</footer>

  <div >
    
    <p id="content" style="page-break-after: : always;text-align: justify;">
      
#content

      
    </p>
  </div>

</body>
  


</html>