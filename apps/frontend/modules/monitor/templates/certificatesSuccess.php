<h2>Certificates</h2>
<table>
  <tr class="header"><td>Common Name</td><td>eMail</td><td>Total Duration</td><td>Bytes Sent</td><td>Bytes Received</td></tr>
  <?php foreach ($certificates as $certificate) { ?>
    <tr>
      <td><?php echo $certificate->getCname(); ?></td>
      <td><?php echo $certificate->getEmail(); ?></td>
      <td><?php echo $certificate->getTotalDuration(); ?></td>
      <td><?php echo $certificate->getTotalBytesSent(); ?></td>
      <td><?php echo $certificate->getTotalBytesReceived(); ?></td>
    </tr>
  <?php } ?>
</table>