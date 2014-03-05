survey online
=============


This is an open source project about survey online. It's allow you vote answer and view survey result.

It's use mysql database to store data. In mysql database has two tables: 

   - surveys: id, question_text, total_vote, status, created_at, updated_at.
   - answers: id, answer_text, survey_id, total_vote, status.
   - Field id in surveys table references to field survey_id in answers table.

Link demo: http://survey-demostore.rhcloud.com/
