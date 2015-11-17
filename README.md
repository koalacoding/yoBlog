# yoBlog
Blog interface coded in PHP.

## Steps finished.

1. Give the ability to the user to delete his own posts.
2. Verification of fields during registration.
3. Give the ability to post comments on blog posts.
4. Show comments of a blog post.
5. manage_blog/index.html : Only apply the 3 points shortcut to the posts with a content of over 164 characters.
6. Show the last comments in view_blog.php.
7. Only show the 5 last comments in "Last comments".
8. Last comments are also shown in "view_post.php".
9. In view_blog.php, show the most recent blog posts first.
10. The most recent comments of "Last comments" are now shown first.
11. In the blog manager when deleting a post, if it has comments, also delete the comments related to that post.
12. In view_blog.php, the module archives is now functional : it offers links to see blog posts of each month of a year.
13. Added a blog options page in the manage blog module to modify the about of our blog.
14. The about of each blog is now shown.
15. If the about of a blog already exists, blog options modifications will modify it.
16. Add "About" in view_post.php.
17. If the user already posted his blog's options, the fields in "blog_options.php" page are now automatically filled with what the user posted.
18. "About" page added.
19. "Contact" page added.
20. Categories module in the right core.
21. Modified the login and register interfaces design
    and added Javascript input verification to them.
22. Improved index.html related files organization.
23. The user can now confirm login/registration by pressing the Enter key.
24. The user can now modify his blog's title, description and their color.
25. Added the "newPost" view.
26. User's posts are now shown in 'blogViewer'.
27. Added 'deleteBlog' view.
28. Fixed 'addNewPost'.
29. The user can now delete posts, and the posts list is dynamically refreshed
    in the 'deleteBlog' view.
30. Added a jQuery UI Dialog to confirm a post's deletion.
31. It is now possible to modify a post.
32. When modifying a post, post's initial title and content is put in the inputs.
33. If the user modifies a post, the post's informations in the view are dynamically refreshed.
34. Changed 'start_page' name to 'startPage'.
35. Modified 'blog_manager" to 'blogManager'.
36. Don't allow to flood 'errorMessage' button in forms.
37. Put 'startPage' under the MVC model.
38. Move session.php.
39. Modify 'blogManager' architecture.
40. Delete all JS 'getScript' and include all the scripts to load in index.html.
41. When clicking on the 'Delete' button in deletePost, the warning message is now correctly shown.
42. Add bruteforce/flood protections.
43. Modify antiFlood to allow 5 requests per second per IP.
44. Limit the number of posts shown on a blog page and allow the user
    to switch between posts pages.
45. Fix : when clicking on buttons multiple times too fast,
    it won't perform its action more than one time thanks to the antiFlood.
46. Modify antiFlood to handle milliseconds.
47. The blog's jumbotron (header) fades in when it has finished loading.
48. Allow the user to search and watch a blog by its name.

## To do.
* Put the website in HTTPS are improve the security of PHP sessions.
* Make blogOptions work.
