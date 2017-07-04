<?php
/**
 * Template Name: Contact Form
 */
get_header();

$_SESSION['first'] = rand(1,9);
$_SESSION['second'] = rand(1,9);
?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<form action="<?php echo esc_url(get_template_directory_uri().'/includes/contact_validation.php')?>" method="POST" role="form" id="contact_form">
				<input type="hidden" name="_action" value="<?= get_permalink($post->ID)?>">

				<?php
				if(isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
					<div class="alert alert-danger">
						<strong><?php echo $_SESSION['error'] ?></strong>
						<?php unset($_SESSION['error']); ?>
					</div>
				<?php endif;?>
				<?php if(isset($_SESSION['success']) && !empty($_SESSION['success'])): ?>
					<div class="alert alert-success">
						<strong><?php echo $_SESSION['success'] ?></strong>
					</div>
					<?php unset($_SESSION['success']); ?>
				<?php endif; ?>
				<legend>Contact Us</legend>

				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
							<?php if(isset($_SESSION['field_validations']['first_name'])): ?>
								<span class="error"><?= $_SESSION['field_validations']['first_name'] ?></span>
								<?php unset($_SESSION['field_validations']['first_name']); ?>

							<?php endif;?>
						</div>
						<div class="col-sm-6">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
							<?php if(isset($_SESSION['field_validations']['last_name'])): ?>
								<span class="error"><?= $_SESSION['field_validations']['last_name'] ?></span>
								<?php unset($_SESSION['field_validations']['last_name']); ?>

							<?php endif;?>
						</div>
					</div>

				</div>

				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
					<?php if(isset($_SESSION['field_validations']['email'])): ?>
						<span class="error"><?= $_SESSION['field_validations']['email'] ?></span>
						<?php unset($_SESSION['field_validations']['email']); ?>
					<?php endif;?>
				</div>
				<div class="form-group">
					<label for="contact_number">Contact Number</label>
					<input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number">
					<?php if(isset($_SESSION['field_validations']['contact_number'])): ?>
						<span class="error"><?= $_SESSION['field_validations']['contact_number'] ?></span>
											<?php unset($_SESSION['field_validations']['contact_number']); ?>

					<?php endif;?>
				</div>
				<div class="form-group">
					<label for="comments">Comments</label>
					<textarea class="form-control" name="comments" id="user-comments"></textarea>
				</div>
				<div class="form-group">
					<label for="captcha" style="display: block;">Human Verification <?= $_SESSION['first']?> + <?= $_SESSION['second']?> = ?</label>
					<input type="text" name="captcha" style="width:50px;display: inline-block;"> 
					<?php if(isset($_SESSION['field_validations']['captcha'])): ?>
						<span class="error"><?= $_SESSION['field_validations']['captcha'] ?></span>
						<?php unset($_SESSION['field_validations']['captcha']); ?>

					<?php endif;?>
				</div>
				<button type="submit" name="form_submit" class="btn btn-primary">Submit</button>
			</form>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer('contact'); ?>
