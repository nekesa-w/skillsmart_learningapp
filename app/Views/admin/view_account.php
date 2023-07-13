<?= $this->extend('layouts/adminlayout') ?>
<?= $this->section('content') ?>


<div class="body1 pt-5" id="bdy1">
              <div class="w-100 mx-auto pt-5">
                <span class="text-danger">
                <?= \Config\Services::validation()->listErrors() ?>
                </span>
                       
                <div class="pt-3">
                      <?php if (! empty($users) && is_array($users)) : ?>
                          <div class="table table-responsive">
                            <table class="table table-striped w-75">
                              <thead>
                                <tr>
                                <th class="text-left">Firstname</th>
                                  <th class="text-left">Lastname</th>
                                  <th class="text-left">Gender</th>
                                  <th class="text-left">Dob</th>
                                  <th class="text-left">Email</th>
                                  <th class="text-left">Password</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($users as $user): ?>
                                <tr>
                                <td><?= esc($user['first_name']) ?></td>
                                  <td><?= esc($user['last_name']) ?></td>
                                  <td><?= esc($user['gender']) ?></td>
                                  <td><?= esc($user['dob']) ?></td>
                                  <td><?= esc($user['email']) ?></td>
                                  <td><?= esc($user['password']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table> 
                          </div>  
                      <?php else : ?>

                        <h3>No Users</h3>
                    <?php endif ?>
                </div>
                        
                   </div>
               </div>  
</div>
        





<?= $this->endSection() ?>