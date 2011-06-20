<h2>Current Connections</h2>
<table>
  <tr class="header"><td>Name</td><td>Real Address</td><td>Virtual Address</td><td>Since</td><td>Bytes Sent</td><td>Bytes Received</td><td>Proto</td></tr>
  <?php foreach ($connections as $connection) { ?>
    <tr>
      <td><?php echo $connection["CommonName"]; ?></td>
      <td><?php echo $connection["RealAddress"]; ?></td>
      <td><?php echo $connection["VirtualAddress"]; ?></td>
      <td><?php echo $connection["Since"]; ?></td>
      <td><?php echo $connection["BytesSent"]; ?></td>
      <td><?php echo $connection["BytesReceived"]; ?></td>
      <td><?php echo $connection["Proto"]; ?></td>
    </tr>
  <?php } ?>
</table>