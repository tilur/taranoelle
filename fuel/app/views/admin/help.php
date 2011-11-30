<p>Each section has a little blurb to help you along through the Admin sections of the system. Simply click on the section header to expand the help text.</p>

<div id="help-background">
	<div class="admin-section-header first help-link">Backgrounds</div>
	<div class="help-content">
		<p>Backgrounds allow you to set different background images to a <span class="pre">path<span> in the site.</p>
		<p>For example, if you wanted the Contact page to have a specific background image, you would go to your <?php echo Html::anchor('/admin/background', 'Admin Backgrounds'); ?> page and add a new image. There you need to supply:<p>
		<ul>
			<li>A title for the image<br /><span class="smaller">To simply remember which page the image is for.</span></li>
			<li>The path the image is for<br /><span class="smaller">You can copy & paste this from the page address, the system will automatically parse out the http:// portion for you.</span></li>
			<li>The image itself</li>
		</ul>
		<p>The system will automatically size the images appropriately, and when you naviage to the page, the image that you have uploaded will be displayed, rather than the defaul image. The only exception to this rule, is the galleries of course, where the background image of those pages comes from the gallery itself.</p>
	</div>
</div>

<div id="help-content">
	<div class="admin-section-header help-link">Content</div>
	<div class="help-content">
		<p>Content pages let you create new pages, that don't fall into the categories that already exist on the site.<p>
		<p>For example, you could create a "Special Offer" page, where you list the details of your special offer. You can then link to this page from any of your social media resources, you can email clients the page, you can send the information in whichever way you deem fit. Currently however, there is no way to get to the content pages through the menu. This section was out of scope of the project, but it's a useful bit moving forward.</p>
		<p>To create new content, you would go to your <?php echo Html::anchor('/admin/content/manage', 'Admin Content'); ?> page, where you need to supply:</p>
		<ul>
			<li>A title for the page<br /><span class="smaller">This will be displayed as the page title when viewing.</span></li>
			<li>The body of the content page<br /><span class="smaller">An editor is provided for you to insert styling.</span></li>
			<li>A path for the page<br /><span class="smaller">This is what users will type into their address bar of the browser. You do not need to supply this, if you don't, the system will automatically generate it from the title of the page which you have supplied. If you would like a specific URL for this page, this is where you would enter it.</span></li>
		</ul>
		<p>The two pages 'About The Photog' and 'Details' are Content pages. The other pages are not, as they need dynamic content from the database and speific layouts. These two pages you can edit at any point, if you wish. Or you can add a <?php echo Html::anchor('/admin/background/manage', 'Background'); ?> to either of them.</p>
	</div>
<div 

<div id="help-galleries">
	<div class="admin-section-header help-link">Galleries</div>
	<div class="help-content">
		Galleries help to be completed yet.
	</div>
</div>

<div id="help-blog">
	<div class="admin-section-header help-link">Blog</div>
	<div class="help-content">
		<p>Blogs are very similar to Content in how they behave. Essentially, Blogs are just another Content page, called something else.</p>
		<p>By adding a title and the body, you're creating a page for the users to view. You can supply a path for the page, or let the system automatically create it for you, using the title of the blog post.</p>
		<p>On the front end of the website, the user is displayed a preview of 10 blogs per page, with a "Read More" link allowing them to link into the full blog posting. Currently however, there is no way to get to the content pages through the menu. We simply need to work out how you would like people to get to the blogs. For reference however, they will be found at <?php echo Html::anchor('http://www.taranoellephotgraphy.com/blog', 'http://www.taranoellephotography.com'); ?>.</p>
		<p>From the <?php echo Html::anchor('/admin/blog/manage', 'Admin Blogs'); ?> screen, you can add new postiongs or manage existing postings.</p>
	</div>
</div>

<div id="help-links">
	<div class="admin-section-header help-link">Links</div>
	<div class="help-content">
		<p>Links are simply links.</p>
		<p>When adding a new link, you need to supply:</p>
		<ul>
			<li>The Category<br /><span class="smaller">This groups the links on the front end.</span></li>
			<li>The URL<br /><span class="smaller">Without this, you wouldn't have a link to begin with.</span></li>
		</ul>
		<p>The <?php echo Html::anchor('/admin/links/manage', 'Admin Links'); ?> screen lets you add new Links and manage existing ones.</p>
	</div>
</div>

<div id="help-users">
	<div class="admin-section-header help-link">Users</div>
	<div class="help-content">
		<p>The <?php echo Html::anchor('/admin/users/manage', 'Admin Users'); ?> screen is where you create users which you grant access to in the <?php echo Html::anchor('/admin/galleries/manage', 'Admin Galleries'); ?> section.<p>
		<p>Before you can setup a gallery to let clients view the photos, there has to be a user. The only information the user account needs to have, is:</p>
		<ul>
			<li>Username<br /><span class="smaller">This is what the user will supply when loggin in to view their gallery.</span></li>
			<li>Full Name<br /><span class="smaller">This is for reference only and not needed in any capacity throughout the site.</span></li>
			<li>Password</li>
		</ul>
		<p>You can add and manage users until the cows come home, you cannot however, delete your own account. This would be counter-productive and so it's not possible. You can however edit the settings.</p>
	</div>
</div>
<script type="text/javascript">help_setup();</script>