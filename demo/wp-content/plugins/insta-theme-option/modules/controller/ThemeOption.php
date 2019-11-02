<?php
/**
 *  
 */
class ThemeOption {
    /**
     * Default Action 
     */
    public function index( $param = null ) {        
        if(!empty($_POST)){
            $this->add($_POST);
        }
        ?>
        <div class="wrap">
            <h2><?php echo get_bloginfo('name'); ?> Theme Options</h2>
            <form method="post" action="admin.php?page=theme-option">                
                <table class="form-table"> 
                    <!-- <tr valign="top">
                        <th scope="row">Company Slogan: </th>
                        <td>
                            <input size="100" type="text" id="company_slogan" name="company_slogan" value="<?php echo get_option('insta_option_company_slogan'); ?>" />
                        </td>
                    </tr> -->
                    <tr valign="top">
                        <th scope="row">Main Logo</th>
                        <td>
                            <input type="text" name="main_logo" id="main_logo" class="regular-text insta-th-image_url" value="<?php echo get_option('insta_option_main_logo'); ?>" size="40" />                            
                            <input name="main_logo_button" type="button" id="upload-btn" class="button-secondary insta-th-upload-btn" value = "Upload Main Logo">
                        </td>       
                    </tr>
                    <tr valign="top">
                        <th scope="row">Footer Logo</th>
                        <td>
                            <input type="text" name="footer_logo" id="footer_logo" class="regular-text insta-th-image_url" value="<?php echo get_option('insta_option_footer_logo'); ?>" size="40" />                            
                            <input name="footer_logo_button" type="button" id="upload-btn" class="button-secondary insta-th-upload-btn" value = "Upload Footer Logo">
                        </td>
                    </tr>                   
                    <?php //$address = explode('##', get_option('insta_option_address')); ?>
                    <tr valign="top">
                        <th scope="row">Banner Address: </th>
                        <td>
                            <textarea cols="100" rows="2" id="banner_address" name="banner_address"><?php echo get_option('insta_option_banner_address'); ?></textarea>
                        </td>
                    </tr>                    
                    <tr valign="top">
                        <th scope="row">Address: </th>
                        <td>
                            <textarea cols="100" rows="2" id="address" name="address"><?php echo get_option('insta_option_address'); ?></textarea>
                            <!-- <input size="100" type="text" id="address" name="address[]" value="<?php //echo $address[0]; ?>" /> -->
                        </td>
                    </tr>                    
                    <tr valign="top">
                        <th scope="row">Phone: </th>
                        <td>
                            <input size="100" type="text" id="phone" name="phone" value="<?php echo get_option('insta_option_phone'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Toll Free: </th>
                        <td>
                            <input size="100" type="text" id="toll-free" name="toll_free" value="<?php echo get_option('insta_option_toll_free'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Fax: </th>
                        <td>
                            <input size="100" type="text" id="fax" name="fax" value="<?php echo get_option('insta_option_fax'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">E-mail: </th>
                        <td>
                            <input size="100" type="text" id="email" name="email" value="<?php echo get_option('insta_option_email'); ?>" />
                        </td>
                    </tr> 
                    <tr valign="top">
                        <th scope="row">Working Hours: </th>
                        <td>
                            <textarea cols="100" rows="4" id="hours" name="hours"><?php echo get_option('insta_option_hours'); ?></textarea>
                        </td>
                    </tr> 


                    <tr valign="top">
                        <th scope="row" colspan="2"><h1>Social Links</h1> </th>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Facebook: </th>
                        <td>
                            <input size="100" type="text" id="fb_link" name="fb_link" value="<?php echo get_option('insta_option_fb_link'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Twitter: </th>
                        <td>
                            <input size="100" type="text" id="twitter_link" name="twitter_link" value="<?php echo get_option('insta_option_twitter_link'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Google Plus: </th>
                        <td>
                            <input size="100" type="text" id="gplus_link" name="gplus_link" value="<?php echo get_option('insta_option_gplus_link'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Linkedin: </th>
                        <td>
                            <input size="100" type="text" id="linkedin_link" name="linkedin_link" value="<?php echo get_option('insta_option_linkedin_link'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Pinterest: </th>
                        <td>
                            <input size="100" type="text" id="pinterest_link" name="pinterest_link" value="<?php echo get_option('insta_option_pinterest_link'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Instagram: </th>
                        <td>
                            <input size="100" type="text" id="instagram_link" name="instagram_link" value="<?php echo get_option('insta_option_instagram_link'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Youtube: </th>
                        <td>
                            <input size="100" type="text" id="youtube_link" name="youtube_link" value="<?php echo get_option('insta_option_youtube_link'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Google Map Link: </th>
                        <td>
                            <input size="100" type="text" id="google_map_link" name="google_map_link" value="<?php echo get_option('insta_option_google_map_link'); ?>" />
                        </td>
                    </tr>                   
                    <tr valign="top" style="display:none">
                        <th scope="row" colspan="2"><h1>Home Page Quick Link:</h1> </th>
                    </tr>
                    <tr valign="top"  style="display:none">
                        <td scope="row" colspan="2">
                            <?php 
                            $args = array(
                                    'sort_order' => 'asc',
                                    'sort_column' => 'ID',
                                    'hierarchical' => 1,
                                    'exclude' => '',
                                    'include' => '',
                                    'meta_key' => '',
                                    'meta_value' => '',
                                    'authors' => '',
                                    'child_of' => 0,
                                    'parent' => -1,
                                    'exclude_tree' => '',
                                    'number' => '',
                                    'offset' => 0,
                                    'post_type' => 'page',
                                    'post_status' => 'publish'
                                ); 
                            $pages = get_pages($args);
                            
                            ?>
                            <table class="form-table">                                
                                <thead>
                                    <tr>
                                        <th scope="row"></th>
                                        <th scope="row">Page Name</th>
                                        <th scope="row">Custom Page Name</th>
                                        <th scope="row">Custom Page Url</th>
                                        <th scope="row">Sorting Number</th>
                                        <th scope="row">Home Page Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $quick_link = get_option('insta_option_page_quick_link');
                                $home_page_quick_link = (!empty($quick_link)) ? json_decode($quick_link) : array();
                                foreach ($pages as $key=>$page){
                                    $selected = "";
                                    $pageValue = array();                                    
                                    foreach ($home_page_quick_link as $idx => $value) {
                                        if($page->ID==$value->page_id){
                                            $selected = 'checked="checked"';
                                            $pageValue = $value;
                                        }                                            
                                    }
                                    //var_dump($pageValue);
                                ?>
                                    <tr valign="top">
                                        <td scope="row">
                                            <input type="checkbox" name="home_page_link[]" <?php echo $selected; ?> value="<?php echo $page->ID; ?>" /> 
                                        </td>
                                        <td scope="row">
                                            <?php echo $page->post_title; ?>
                                        </td>
                                        <td scope="row">
                                            <input type="text" name="home_page_link_custom_name[<?php echo $page->ID; ?>]" size="40" value="<?php echo isset($pageValue->page_custom_name) ? $pageValue->page_custom_name : "";?>" />
                                        </td>
                                        <td scope="row">
                                            <input type="text" name="home_page_link_custom_url[<?php echo $page->ID; ?>]" size="40" value="<?php echo isset($pageValue->page_custom_url) ? $pageValue->page_custom_url : "";?>" />
                                        </td>
                                        <td scope="row">
                                            <input type="text" name="home_page_link_sort[<?php echo $page->ID; ?>]" size="5" value="<?php echo isset($pageValue->page_sorting) ? $pageValue->page_sorting : "";?>" />
                                        </td>                                    
                                        <td  scope="row">
                                            <textarea cols="30" rows="3" name="home_page_link_label[<?php echo $page->ID; ?>]" ><?php echo isset($pageValue->page_custom_content) ? $pageValue->page_custom_content : "";?></textarea>
                                        </td>
                                    </tr>                            
                                <?php } ?>
                                </tbody>
                            </table>                       
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>


        <script type="text/javascript">
        jQuery(document).ready(function(jQuery){
            var dom_this = "";
            jQuery('.insta-th-upload-btn').click(function(e) {
                e.preventDefault();
                dom_this =jQuery(this);
                var image = wp.media({ 
                    title: 'Upload Image',
                    // mutiple: true if you want to upload multiple files at once
                    multiple: false
                }).open()
                .on('select', function(e){
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_image = image.state().get('selection').first();
                    // We convert uploaded_image to a JSON object to make accessing it easier
                    // Output to the console uploaded_image
//                    console.log(uploaded_image);
                    var image_url = uploaded_image.toJSON().url;
                    // Let's assign the url value to the input field
                    jQuery(dom_this).parent('td').find('.insta-th-image_url').val(image_url);
                });
            });
        });
        </script>

        <?php
    }
    public function add( $postData = array() ) {        
        if(!empty($postData)){
            // $quick_links = array();
            // $quick_link_id = (isset($postData['home_page_link']) && !empty($postData['home_page_link'])) ? $postData['home_page_link'] : '';
            // $quick_link_custom_name = (isset($postData['home_page_link_custom_name']) && !empty($postData['home_page_link_custom_name'])) ? $postData['home_page_link_custom_name'] : '';
            // $quick_link_custom_url = (isset($postData['home_page_link_custom_url']) && !empty($postData['home_page_link_custom_url'])) ? $postData['home_page_link_custom_url'] : '';
            // $quick_link_sorts = (isset($postData['home_page_link_sort']) && !empty($postData['home_page_link_sort'])) ? $postData['home_page_link_sort'] : '';
            // $quick_link_custom_content = (isset($postData['home_page_link_label']) && !empty($postData['home_page_link_label'])) ? $postData['home_page_link_label'] : '';
            
            // for($qli=0; $qli<count($quick_link_id); $qli++){
            //     $quick_links[$qli]["page_id"] = $quick_link_id[$qli];
            //     $quick_links[$qli]["page_custom_name"] = $quick_link_custom_name[$quick_link_id[$qli]];
            //     $quick_links[$qli]["page_custom_url"] = $quick_link_custom_url[$quick_link_id[$qli]];
            //     $quick_links[$qli]["page_sorting"] = $quick_link_sorts[$quick_link_id[$qli]];
            //     $quick_links[$qli]["page_custom_content"] = $quick_link_custom_content[$quick_link_id[$qli]];                
            // }

            
            $data = array(
                        'company_slogan' => (isset($postData['company_slogan']) && !empty($postData['company_slogan'])) ? $postData['company_slogan'] : '',
                        'main_logo' => (isset($postData['main_logo']) && !empty($postData['main_logo'])) ? $postData['main_logo'] : '',
                        'footer_logo' => (isset($postData['footer_logo']) && !empty($postData['footer_logo'])) ? $postData['footer_logo'] : '',
                        //'address' => (isset($postData['address']) && !empty($postData['address'])) ? implode("##", $postData['address']) : '',
                        'address' => (isset($postData['address']) && !empty($postData['address'])) ? $postData['address'] : '',
                        'banner_address' => (isset($postData['banner_address']) && !empty($postData['banner_address'])) ? $postData['banner_address'] : '',
                        'phone' => (isset($postData['phone']) && !empty($postData['phone'])) ? $postData['phone'] : '',
                        'toll_free' => (isset($postData['toll_free']) && !empty($postData['toll_free'])) ? $postData['toll_free'] : '',                        
                        'fax' => (isset($postData['fax']) && !empty($postData['fax'])) ? $postData['fax'] : '',
                        'email' => (isset($postData['email']) && !empty($postData['email'])) ? $postData['email'] : '',
                        'hours' => (isset($postData['hours']) && !empty($postData['hours'])) ? $postData['hours'] : '',

                        'fb_link' => (isset($postData['fb_link']) && !empty($postData['fb_link'])) ? $postData['fb_link'] : '',
                        'twitter_link' => (isset($postData['twitter_link']) && !empty($postData['twitter_link'])) ? $postData['twitter_link'] : '',
                        'gplus_link' => (isset($postData['gplus_link']) && !empty($postData['gplus_link'])) ? $postData['gplus_link'] : '',
                        'linkedin_link' => (isset($postData['linkedin_link']) && !empty($postData['linkedin_link'])) ? $postData['linkedin_link'] : '',
                        'pinterest_link' => (isset($postData['pinterest_link']) && !empty($postData['pinterest_link'])) ? $postData['pinterest_link'] : '',
                        'instagram_link' => (isset($postData['instagram_link']) && !empty($postData['instagram_link'])) ? $postData['instagram_link'] : '',
                        'youtube_link' => (isset($postData['youtube_link']) && !empty($postData['youtube_link'])) ? $postData['youtube_link'] : '',
                        'google_map_link' => (isset($postData['google_map_link']) && !empty($postData['google_map_link'])) ? $postData['google_map_link'] : ''
                    );
            
            update_option( 'insta_option_company_slogan' , $data['company_slogan']);
            update_option( 'insta_option_main_logo' , $data['main_logo']);
            update_option( 'insta_option_footer_logo' , $data['footer_logo']);
            update_option( 'insta_option_address' , $data['address']);
            update_option( 'insta_option_banner_address' , $data['banner_address']);
            update_option( 'insta_option_phone' , $data['phone']);
            update_option( 'insta_option_toll_free' , $data['toll_free']);
            update_option( 'insta_option_fax' , $data['fax']);
            update_option( 'insta_option_email' , $data['email']);
            update_option( 'insta_option_hours' , $data['hours']);

            update_option( 'insta_option_fb_link' , $data['fb_link']);
            update_option( 'insta_option_twitter_link' , $data['twitter_link']);
            update_option( 'insta_option_gplus_link' , $data['gplus_link']);
            update_option( 'insta_option_linkedin_link' , $data['linkedin_link']);
            update_option( 'insta_option_pinterest_link' , $data['pinterest_link']);
            update_option( 'insta_option_instagram_link' , $data['instagram_link']);
            update_option( 'insta_option_youtube_link' , $data['youtube_link']);
            update_option( 'insta_option_google_map_link' , $data['google_map_link']);
            
            //update_option( 'insta_option_page_quick_link' , json_encode($quick_links) );
        }
    }
}
?>