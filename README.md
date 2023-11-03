# wp-sample-block-demo

1. Run `npm run wp-env start`
2. Activate the demo-plugin
3. Enable Permalinks (might not be necessary)
4. Go to Appearance/Editor and add the `Single Item: Keynote` template

![image](https://github.com/markcummins/wp-sample-block-demo/assets/5557433/5b4541fc-b385-4d1b-b964-19521c05bf27)

5. Add the `Keynotes - Header` block to the page
   
![image](https://github.com/markcummins/wp-sample-block-demo/assets/5557433/c6b53a6a-a04b-4dad-a6cf-5158e4c87490)

### What should happen:

The render_callback function should output `true` three times, as it did in WP 6.3

![wp 6 3](https://github.com/markcummins/wp-sample-block-demo/assets/5557433/97f56581-a04c-4668-83cf-4a61b0a26ac9)

### What does happen:

The render_callback function returns false the first time it is called
(to test this, you can change   "core": "https://wordpress.org/wordpress-6.4-RC3.zip", to "core": null in .wp-env)

![wp 6 4 rc3](https://github.com/markcummins/wp-sample-block-demo/assets/5557433/2df333a6-a0d7-435d-9b5e-9a24e5ac80aa)

### Callback Function:

```
function render_callback_cp_keynotes_header($block_attributes, $content)
{
  var_dump(have_posts());
  var_dump(have_posts());
  var_dump(have_posts());
}
```
