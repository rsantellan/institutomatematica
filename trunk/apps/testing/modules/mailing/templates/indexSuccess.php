<h1>Mailings List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Texto</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($mailings as $mailing): ?>
    <tr>
      <td><a href="<?php echo url_for('mailing/show?id='.$mailing->getId()) ?>"><?php echo $mailing->getId() ?></a></td>
      <td><?php echo html_entity_decode($mailing->getTexto()) ?></td>
      <td><?php echo format_date($mailing->getCreatedAt(),'D') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mailing/new') ?>">New</a>
