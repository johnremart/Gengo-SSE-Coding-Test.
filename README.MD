### Deployment
```
cd DOCUMENT_ROOT # where DOCUMENT_ROOT is your server's document root
git clone https://github.com/johnremart/Gengo-SSE-Coding-Test..git
mv Gengo-SSE-Coding-Test. palindrome
```

You can access the project via:
```
http://HOSTNAME/palindrome # where HOSTNAME is your server's host name

e.g. http://localhost/palindrome
```

### Testing
For testing purposes, I already deployed the code to 
```
http://palindrome.johnremart.com/
```

### Notes
The exam is actually quite challenging, it really makes you think outside the box. My first step in working with this project was to create a basic PHP page which will be used to test and display the result of the functions that I’m going to create.

Level 1 of the exam was not that hard, we just need to check if the string is just the same when you read it backwards. There is a PHP function strrev() which can be used to reverse the string and compare it with the original string.

Level 2 is getting more exciting. I’m not sure if there is a better way to approach it but what I did is that, first, is check if the string is palindrome itself, if it is then return the string. This is because by definition the string is a substring of itself. Next, if the given string is not palindrome then get all the substrings of the given string. Third, sort all the substrings by the number characters in descending order. Once the substrings are sorted then we can now proceed to check if the string substring is palindrome or not from longest to the shortest. Return the string if you found a substring.

Level 3 is actually the hardest part of the exam cause it took me awhile to think of the best approach on how to do it. I tested different algorithms but those algorithms seems to be a repeated process of the level 2. So what I did was to use the function I made for level 2. The result of the function in Level 2 (the longest substring that is palindrome) is used to split the given string, then do the same process to the remaining substrings.

I reuse all the functions created in the previous level to avoid repetitive codes so we can easily update the code if some changes in the process were made.
