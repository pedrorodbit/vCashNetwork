<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{$page.name} - vCash.network</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/assets/bootstrap/themes/{nocache}{$theme}{/nocache}.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/dataTables.bootstrap.min.css">
    <style>
      body {
        background-color: #b60127;
      }
      h1 {
        color: white;
      }
    </style>
  </head>
  <body>

    <div class="col-md-12 text-center">
      <br>
      <img src="/assets/bootstrap/img/logoGrey.png" width="64">
      <h1>vCash [XVC] Network</h1>
      <br>
    </div>

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="fa fa-list" aria-hidden="true"></i> Peers list
          </h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="peersList">
            <thead>
              <tr>
                <th>IP</th>
                <th>Port</th>
                <th>Last send</th>
                <th>Last receive</th>
                <th>Connection time</th>
                <th>User agent</th>
                <th>Height</th>
              </tr>
            </thead>

            <tbody>
              {nocache}
                {foreach $peers as $row}
                  <tr>
                    <td data-order="{$row.ip}">{$row.ip}</td>
                    <td data-order="{$row.port}">{$row.port}</td>
                    <td data-order="{$row.lastsend}"><time class="timeago" datetime="{$row.lastsend|date_format:"%Y-%m-%dT%H:%M:%SZ"}" data-toggle="tooltip" title="{$row.lastsend|date_format:"%Y-%m-%d %H:%M:%S"} (UTC)"></time></td>
                    <td data-order="{$row.lastrecv}"><time class="timeago" datetime="{$row.lastrecv|date_format:"%Y-%m-%dT%H:%M:%SZ"}" data-toggle="tooltip" title="{$row.lastrecv|date_format:"%Y-%m-%d %H:%M:%S"} (UTC)"></time></td>
                    <td data-order="{$row.conntime}"><time class="timeago" datetime="{$row.conntime|date_format:"%Y-%m-%dT%H:%M:%SZ"}" data-toggle="tooltip" title="{$row.conntime|date_format:"%Y-%m-%d %H:%M:%S"} (UTC)"></time></td>
                    <td data-order="{$row.subver}">{$row.subver}</td>
                    <td data-order="{$row.startingheight}">{$row.startingheight|number_format}</td>
                  </tr>
                {/foreach}
              {/nocache}
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="/assets/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap/js/jquery.timeago.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#peersList').DataTable({
          "order": [[ 3, "desc" ]]
        });

        $('[data-toggle="tooltip"]').tooltip();
        $('time.timeago').timeago();

        $('#peersList').on('draw.dt', function() {
          $('[data-toggle="tooltip"]').tooltip();
          $('time.timeago').timeago();
        });

      });
    </script>
  </body>
</html>
